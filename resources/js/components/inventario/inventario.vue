<template>

	<div>


		<table class="table  table-bordered table-sm">
			<thead>
				<tr align="center">
					<th colspan="4">INVENTARIO</th>
					<th>
						<button type="button" class="btn btn-primary top-space" data-toggle="modal" data-backdrop="static" data-target="#modal_pro">Crear Factura</button> 
					</th>
				</tr>
			    
			</thead>
				<tbody>
					<tr v-for="proveedor in proveedors">
 
						<td>cod. factura :{{ proveedor.codigo}}</td>
						<td align="center">nombre proveedor:{{ proveedor.proveedor}}</td>      
						<td align="center">total:{{ proveedor.total}}</td>
						<td align="center">
							<button type="button" @click="editProductos(producto)" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-target="#crearProducto">
							  Inventariar
							</button>
						</td>
						<td align="center">
							<button type="button" @click="deleteProductos(producto)" class="btn btn-danger btn-sm" data-toggle="modal" data-backdrop="static" data-target="#deleteProducto">
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
			axios.get('http://venta.test/entradafactura').then(response =>(this.proveedors = response.data))
		}

}
 
</script>

<style>
	.top-space{
		margin-top: 20px
	}
</style>