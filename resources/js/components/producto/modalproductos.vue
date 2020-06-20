<template>
	<div class="modal fade" id="nuevoproducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header"> 
			        <h5 class="modal-title" id="exampleModalLabel">{{ titulo }}</h5>
			        <button type="button" @click="reset()" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
		      <div class="modal-body">
				    <form enctype="multipart/from-data" @submit.prevent="guardarproducto" class="form-group" id="formProductos" autocomplete="off">

						<div class="form-group"> 
							<div class="input-group input-group-lg">
								<div class="input-group-prepend">
									<div for="categoria" class="input-group-text">Categoria de Barra</div>
								</div>
								<select v-model="categoria" class="form-control" id="nombre" >
									<option disabled value="">Seleccione una Categoria</option>
									<option v-for="(nombre,key) in codcategoria" :value="key">{{ nombre }}</option>
								</select>  
							</div>
						</div>
	 

						<div class="form-group"> 
							<div class="input-group input-group-lg">
								<div class="input-group-prepend">
									<div for="codigo" class="input-group-text">Codigo de Barra</div>
								</div>
								<input type="text" class="form-control" id="codigo" aria-describedby="nombreHelp" placeholder="Codigo Factura" v-model="codigo">
							</div>
						</div>

						<div class="form-group"> 
							<div class="input-group input-group-lg">
								<div class="input-group-prepend">
									<div for="nombre" class="input-group-text">Nombre</div>
								</div>
								<input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Codigo Factura" v-model="nombre">
							</div>
						</div>


						<div class="form-group"> 
							<div class="input-group input-group-lg">
								<div class="input-group-prepend">
									<div for="precio_ini" class="input-group-text">Precio Inicial</div>
								</div>
								<input type="text" class="form-control" id="precio_ini" aria-describedby="nombreHelp" placeholder="Codigo Factura" v-model="precio_ini">
							</div>
						</div>

						<div class="form-group"> 
							<div class="input-group input-group-lg">
								<div class="input-group-prepend">
									<div for="Porcentaje" class="input-group-text">Porcentaje</div>
								</div>
								<input type="text" class="form-control" id="Porcentaje" aria-describedby="nombreHelp" placeholder="Codigo Factura" v-model="Porcentaje">
							</div>
						</div>

						<div class="form-group"> 
							<div class="input-group input-group-lg">
								<div class="input-group-prepend">
									<div for="precio_final" class="input-group-text">Precio Final</div>
								</div>
								<input type="text" class="form-control" id="precio_final" aria-describedby="nombreHelp" placeholder="Codigo Factura" v-model="precio_final">
							</div>
						</div>

						<div class="form-group"> 
							<div class="input-group input-group-lg">
								<div class="input-group-prepend">
									<div for="cantidades" class="input-group-text">Cantidades</div>
								</div>
								<input type="text" class="form-control" id="cantidades" aria-describedby="nombreHelp" placeholder="Codigo Factura" v-model="cantidades">
							</div>
						</div>

						<div class="form-group"> 
							<div class="input-group input-group-lg">
								<div class="input-group-prepend">
									<div for="imagenprod" class="input-group-text">Imagen</div>
								</div>
							<input type="file" class="form-control" name="imagenprod" id="imagenprod" aria-describedby="nombreHelp" placeholder="Codigo Factura" @change="obtenerimagen">
							</div>
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
				producto:{
					imagenprod:'',
				},
				codigo:'',
				categoria: null,
				nombre:'',
				precio_ini:'',
				Porcentaje:'',
				precio_final:'0',
				cantidades:'',
				
				slug_pro:'',
				update : 0,
				titulo : "Nuevo Producto",
				codcategoria:{}
			}
		},
		mounted() {
            axios.get('http://venta.test/productos').then(response => {this.codcategoria =  response.data.codcategoria })
			EventBus.$on('producto-edit', data => {
				this.codigo = data.codigo;
				this.nombre = data.nombre;
				this.categoria = data.categoria.id;
				this.precio_ini = data.precio_ini;
				this.Porcentaje = data.Porcentaje;
				this.precio_final = data.precio_final;
				this.cantidades = data.cantidades;
				this.slug_pro = data.slug_pro;
				this.update = 1;
				this.titulo = "Editar Producto";
				var data = new  FormData();
	                //Añadimos la imagen seleccionada
	                data.append('imagenprod', this.producto.imagenprod);


			});
        },
		methods: {


			obtenerimagen(e){ 
				this.producto.imagenprod = event.target.files[0];

			},

			guardarproducto : function()

			{ 
				let metodo = this;
				if (this.update==0) 
				{
					var data = new  FormData();
	                //Añadimos la imagen seleccionada
	                data.append('imagenprod', this.producto.imagenprod);
	                data.append('codigo', this.codigo);
	                data.append('categoria', this.categoria);
	                data.append('nombre', this.nombre);
	                data.append('precio_ini', this.precio_ini);
	                data.append('Porcentaje', this.Porcentaje);
	                data.append('precio_final', this.precio_final);
	                data.append('cantidades', this.cantidades);
	                //Añadimos el método PUT dentro del formData
	                // Como lo hacíamos desde un formulario simple _(no ajax)_
	                data.append('_method', 'POST');
	                //Enviamos la petición
	                axios.post('http://venta.test/productos',data)
	                .then(function(res){
						console.log(res)
						$('#nuevoproducto').modal('hide')
						$(document.body).removeClass('modal-open');
					$('.modal-backdrop').remove();
						EventBus.$emit('producto-agregar', res.data.productos)
						metodo.reset();
						console.log(EventBus)
					})
					.catch(function(err){
						console.log(err)
					});
				}
				else
				{
					var data = new  FormData();
	                //Añadimos la imagen seleccionada
	                data.append('imagenprod', this.producto.imagenprod);
	                data.append('codigo', this.codigo);
	                data.append('categoria', this.categoria);
	                data.append('nombre', this.nombre);
	                data.append('precio_ini', this.precio_ini);
	                data.append('Porcentaje', this.Porcentaje);
	                data.append('precio_final', this.precio_final);
	                data.append('cantidades', this.cantidades);
	                data.append('slug_pro', this.slug_pro);
	                //Añadimos el método PUT dentro del formData
	                // Como lo hacíamos desde un formulario simple _(no ajax)_
	                data.append('_method', 'POST');
	                //Enviamos la petición
	                axios.post('http://venta.test/productos',+this.slug_pro,)
					.then(function(res){
					console.log(res)
					$('#nuevoproducto').modal('hide')
					$(document.body).removeClass('modal-open');
					$('.modal-backdrop').remove();
					EventBus.$emit('producto-agregar', res.data.productos)
					metodo.reset();
					})
					.catch(function(err){
					console.log(err)
					});	

				}
			},
			    reset: function(){
			     this.imagenprod = "" ;
				 this.codigo = "" ;
				 this.categoria = "" ;
				 this.nombre = "" ;
				 this.precio_ini = "" ;
				 this.Porcentaje = "" ;
				 this.precio_final = "" ;
				 this.cantidades = "" ;
				 this.slug_pro = "" ;
	 			this.titulo = "Nuevo Producto";
	 			this.update = 0;
	 			$('#crearProducto').modal('hide');
    			$(document.body).removeClass('modal-open');
				$('.modal-backdrop').remove();
        	},
 		
		}
	}
	

</script>
<style>
	
</style>


