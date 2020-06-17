<template>

	<div> 
				<table class="table table-dark table-hover table-bordered table-sm">
			<thead>
				<tr align="center">
					<th colspan="4">INVENTARIO</th>
					<th>
						<button type="button" class="btn btn-primary top-space" data-toggle="modal" data-backdrop="static" data-target="#modal_pro">Crear Factura</button> 
					</th>
				</tr>
			    <tr align="center">
			      <th scope="col">cod. factura</th>
			      <th scope="col">nombre proveedor</th>
			      <th scope="col">total</th> 
			      <th scope="col">Editar</th>
			      <th scope="col">Eliminar</th>
			    </tr>
			</thead>
				<tbody>
					<tr v-for="proveedor in proveedors">
						<td align="center">{{ proveedor.codigo}}</td> 
						<td align="center">{{ proveedor.proveedor.nombre}}</td>
						<td align="center">{{ proveedor.total }}</td>
						<td align="center">
							<button type="button" @click="editProductos(tablaprods)" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-target="#crearProducto">
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
				proveedors:[]
			}
		},
		created(){
			EventBus.$on('inventario-agregar', data => {
				this.proveedors.push(data)
			})
		},
		mounted(){
			axios.get('http://venta.test/entradafactura').then(response =>(this.proveedors = response.data.proveedors))
		}

}
 
</script>

<style>
	.top-space{
		margin-top: 20px
	}
</style>