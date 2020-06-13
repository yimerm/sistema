<template>
	<div class="modal fade" id="modal_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"></h5>
			        <button type="button" @click="reset()" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
		      <div class="modal-body">
				    <form @submit.prevent="guardarinventario" class="form-group" id="formProductos" autocomplete="off">
						<div class="form-group">
							<label for="codigo">Codigo Factura</label>
							<input type="text" class="form-control" id="codigo" aria-describedby="nombreHelp" placeholder="Codigo Factura" v-model="codigo">
						</div>

						<div class="form-group">
							<label for="nombre">Tipo de proveedor</label>
							<select v-model="proveedor" class="form-control" id="nombre" >
								<option disabled value="">Seleccione un productosss</option>
								<option v-for="(nombre,key) in codprove" :value="key">{{ nombre }}</option>
							</select>  
						</div>


						<div class="form-group" align="center">
							<button type="submit" class="btn btn-success">Guardar</button> 
							<button type="button" @click="reset()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						</div>
		       	 	</form>
	       		</div>
	       	</div>
	    </div>
	</div>

</template>

<script>
	import EventBus from '../../event-bus';
export default 
	{
		data(){
			return{
				codigo:'',
				proveedor: null,
				codprove:{}
			}
		},
		mounted() {
            axios.get('http://venta.test/entradafactura').then(response => {this.codprove =  response.data.codprove });
        },
		methods: {
			guardarinventario : function()
			{
				axios.post('http://venta.test/entradafactura',{
					codigo: this.codigo,
					proveedor: this.proveedor
				})
				.then(function(res){
					console.log(res)
					$('#modal_pro').modal('hide')
					EventBus.$emit('inventario-agregar', res.data.entradafactura)
				})
				.catch(function(err){
					console.log(err)
				});
			},
 
		}
	}
</script>
<style>
	
</style>