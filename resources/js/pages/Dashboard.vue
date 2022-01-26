<template>
	<div class="container">
		<h4 class="text-muted">Buen día, <b class="text-dark">{{ user.name }}</b></h4>
		<productos />
	</div>
</template>
<script type="text/javascript">
	import productos from '../components/Productos.vue'
	import { mapGetters, mapActions } from "vuex";
	export default{
		components:{
			productos
		},
		computed: {
	    	...mapGetters({ user: "getUser"}),
	 	},
	}
</script>