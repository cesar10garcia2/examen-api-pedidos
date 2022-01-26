<template>
    <div class="container">
        <div class="listado-productos row row-cols-1 row-cols-xl-3 row-cols-lg-2 g-4">
            <div  v-for="(producto,index) in productos" :key="index" class="col col-producto">
                <div class="card">
                    <img :src="producto.url_imagen" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{producto.nombre}} <strong>S/{{ Number(producto.precio_venta).toFixed(2) }}</strong></h5>
                        <p class="card-text">{{producto.descripcion | truncate(150)}}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <button @click="saveProductoEnCarrito(producto.id)" type="button" class="btn btn-block btn-success">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-carro-compra" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Carrito de compra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Producto</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(carrito, index) in carrito_compra" :key="index">
                                <td>{{index + 1}}</td>
                                <td>{{carrito.nombre}}</td>
                                <td>
                                    <button type="button"
                                    @click="deleteProductoEnCarrito(carrito.carro_compra_id)"
                                    class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" @click="savePedido()" class="btn btn-primary">Guardar Pedido</button>
                </div>
                </div>
            </div>
        </div>

        <div v-if="isLoggedIn" id="inferior">
            <div class="container">
                <section class="row">
                    <div class="col-9">
                        <h2> <strong>Total: S/.{{ total_carrito.toFixed(2) }}</strong></h2>
                    </div>
                    <div class="col-3">
                        <button type="button"
                        data-toggle="modal" data-target="#modal-carro-compra"
                        class="btn btn-secondary btn-block">
                            Ver carrito
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<style lang="css">
    .card-img-top{
        max-height: 250px;
    }
    .card-body{
        min-height: 200px;
    }
    .col-producto{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    body,html{
        height:100%; /*Siempre es necesario cuando trabajamos con alturas*/
    }
    #inferior{
        position:fixed; /*El div será ubicado con relación a la pantalla*/
        left:0px; /*A la derecha deje un espacio de 0px*/
        right:0px; /*A la izquierda deje un espacio de 0px*/
        bottom:0px; /*Abajo deje un espacio de 0px*/
        height:50px; /*alto del div*/
        z-index:0;
    }
    #inferior .container{
        background: #27884d;
        height:50px;
        border-radius: 15px 15px 0 0;
    }
    #inferior .container section{
        padding-top: 10px;
        color: white;
    }
    .listado-productos{
        padding-bottom: 80px;
    }
</style>
<script>
    export default {
        data(){
            return{
                carrito_compra:[],
                productos:[],
                total_carrito: 0.00,
                api_productos: 'productos',
                api_carro_compras: 'carro-compra',
                api_pedido: 'pedido'
            }
        },
        mounted(){
            // get api data
            this.axios.get(this.api_productos).then(res =>{
                this.productos = res.data;
            });
            this.listarCarroCompra();
        },
        methods:{
            listarCarroCompra(){
                this.axios.get(this.api_carro_compras).then(res =>{
                    this.carrito_compra = res.data;
                    var total = 0;
                    for (let i = 0; i < this.carrito_compra.length; i++) {
                        const element = this.carrito_compra[i];
                        console.log(element)
                        total = total + Number(element['precio_venta']);
                    }
                    this.total_carrito = total;
                });
            },
            saveProductoEnCarrito(producto_id, precio_venta){
                let data = {
                    'producto_id': producto_id,
                    'cantidad': 1,
                    'precio_venta': precio_venta
                };
                this.axios.post(this.api_carro_compras, data).then(res =>{
                    this.listarCarroCompra();
                    alert('Guardado con exito')
                });
            },
            savePedido(){
                this.axios.post(this.api_pedido, {}).then(res =>{
                    if(res.data['status'] == 'success'){
                        alert(res.data['mensaje'])
                        this.listarCarroCompra();
                    }else{
                        alert(res.data['mensaje'])
                    }
                });
            },
            deleteProductoEnCarrito(carro_compra_id){
                this.axios.delete(this.api_carro_compras+'/'+carro_compra_id).then(res=>{
                    this.listarCarroCompra();
                })
            }
        },
        filters: {
            truncate: function(data,num){
                const reqdString = data.split("").slice(0, num).join("");
                return reqdString;
            }
        },
        computed : {
            isLoggedIn : function(){ 
                return this.$store.getters.isLoggedIn
            }
        },
    }
</script>