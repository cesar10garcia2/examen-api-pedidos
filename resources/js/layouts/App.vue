<template>
   <div id="app">
      <nav class="navbar navbar-dark navbar-expand-sm bg-dark fixed-top">
         <div class="container">
            <router-link to="/" class="navbar-brand"> &nbsp;Manzana</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
               <ul class="navbar-nav ml-auto" v-if="isLoggedIn">

	               	<li class="navbar-nav ml-auto">
	               		<router-link class="nav-link" to="/dashboard">Inicio</router-link>
	               	</li>

                     <li class="navbar-nav ml-auto">
	               		<router-link class="nav-link" to="/pedido">Pedidos</router-link>
	               	</li>

	               	<li class="navbar-nav ml-auto">
	               		<button class="btn btn-secondary text-white pl-3 pr-3 btn-sm" @click="logout()">Cerrar sesion</button>
	               	</li>
               	
               </ul>

               <ul class="navbar-nav ml-auto" v-else>
                  <li class="nav-item">
                  	<router-link to="/login" class="nav-link">Iniciar sesión</router-link>
                  </li>
                  <li class="nav-item">
                  	<router-link to="/register" class="nav-link">Regístrate</router-link>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

      <div class="mt-5 pt-3">
      		<router-view></router-view>
      </div>


   </div>
</template>

<script>
   export default{
   	name:"App",
      data(){
         return{
            user:''
         }
      },
   	computed : {
        isLoggedIn : function(){ 
         	return this.$store.getters.isLoggedIn
        }
      },
      created(){
         console.log(this.isLoggedIn);
         if(this.isLoggedIn){
            this.$store.dispatch('getUser');
         }else{
            this.$router.push('/login')
         }
      },
      methods: {
        async logout (){
            await this.$store.dispatch('logout')
            this.$router.push('/login')
        }
      },
   }
</script>
