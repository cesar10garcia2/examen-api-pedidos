<template>
	<div class="container">
		<h4 class="text-muted">Pedidos de, <b class="text-dark">{{ user.name }}</b></h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Total</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(pedido, index) in pedidos" :key="index">
                    <td>{{index + 1}}</td>
                    <td>{{pedido.fecha_hora}}</td>
                    <td>{{pedido.total_bruto}}</td>
                    <td>
                        <button type="button"
                        @click="getDetallePedidos(pedido.id)"
                        data-toggle="modal" data-target="#detalle_modal_pedido"
                        class="btn btn-info">Detalle</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <section>
            <!-- Modal -->
            <div class="modal fade" id="detalle_modal_pedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalle Pedido</h5>
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
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(detalle, index) in detalle_pedido" :key="index">
                                        <td>{{index + 1}}</td>
                                        <td>{{detalle.nombre}}</td>
                                        <td>{{detalle.cantidad}}</td>
                                        <td>{{detalle.precio_venta}}</td>
                                        <td>{{detalle.subtotal}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	</div>
</template>
<script type="text/javascript">
	import { mapGetters } from "vuex";
	export default{
        data(){
            return{
                pedidos:[],
                detalle_pedido:[],
                api_pedido: 'pedido',
            }
        },
        mounted(){
            this.listarPedidos();
        },
        methods:{
            listarPedidos(){
                this.axios.get(this.api_pedido).then(res =>{
                    this.pedidos = res.data;
                });
            },
            getDetallePedidos(id){
                this.axios.get(this.api_pedido + '/'+ id).then(res =>{
                    this.detalle_pedido = res.data;
                });
            },
        },
		computed: {
	    	...mapGetters({ user: "getUser"}),
	 	},
	}
</script>