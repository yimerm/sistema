<template>

	<div> 
		<table class="table table-dark table-hover table-bordered table-sm">
			<thead>
				<tr align="center">
					<th colspan="9">Listado de Productos</th>
					<th>
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-backdrop="static" data-target="#nuevoproducto">
						  +Producto
						</button>
					</th>
				</tr>
			    <tr align="center">
			      <th scope="col">Imagen</th>
			      <th scope="col">Codigo</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Categoria</th>
			      <th scope="col">Precio Factura</th>
			      <th scope="col">Porcentage %</th>
			      <th scope="col">Precio Venta</th>
			      <th scope="col">Cantidades</th>
			      <th scope="col">Editar</th>
			      <th scope="col">Eliminar</th>
			    </tr>
			</thead>
				<tbody>
					<tr v-for="tablaprods in tablaprod">

						<td align="center">{{ tablaprods.imagenprod}}</td> 
						<td align="center">{{ tablaprods.codigo}}</td>      
						<td align="center">{{ tablaprods.nombre }}</td>
						<td align="center">{{ tablaprods.categoria.nombre}}</td>
						<td align="center">{{ tablaprods.precio_ini }}</td>
						<td align="center">{{ tablaprods.Porcentaje }}</td>
						<td align="center">{{ tablaprods.precio_final }}</td>
						<td align="center">{{ tablaprods.cantidades }}</td>
						<td align="center">
							<button type="button" @click="editProductos(tablaprods)" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-target="#nuevoproducto">
							  Editar
							</button>
						</td>
						<td align="center">
							<button type="button" @click="deleteProductos(tablaprods)" class="btn btn-danger btn-sm" data-toggle="modal" data-backdrop="static" data-target="#deleteProducto">
							  Eliminar
							</button>
						</td>
					</tr>
				</tbody>
		</table>
	</div>
	
</template>

<script>
import EventBus from '../../event-bus';
	export default {
		data(){
			return{
				tablaprod:[]
			}
		},
		created(){
			EventBus.$on('producto-agregar', data => {
				this.tablaprod.push(data)
			})
		},
		mounted(){
			axios.get('http://venta.test/productos').then(response =>(this.tablaprod = response.data.tablaprod))
		},
		
		methods: {

			editProductos(data){
			EventBus.$emit('producto-edit',data)
			},
			deleteProductos(data){
			EventBus.$emit('producto-delete',data)
			}
		},

}
 
</script>

<style>
	.top-space{
		margin-top: 20px
	}
</style>