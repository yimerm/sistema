@extends('layouts.app')
@section('title','Productos')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page">Productos</li>
@endsection
@section('content')
 
<div class="container">
	<div class="row" style=" margin-top: 30px;"> 
		<div class="col-5 well">
		</div>
		<div align="right" class="col-4 well">
			<a class="btn btn-primary" href="{{route('productos.create')}}" role="button">+ Prodcutos</a>
		</div> 
		<div class="col-3 well">
		</div>
	</div>
	<div class="row"> 
		<div class="col-10">
			
			<table class="table  table-hover">
				<thead style="color: #FFFFFF; background-color: #808080;"  >
					<tr>
						<th scope="col">Imagen</th>
						<th scope="col">Codigo</th>
						<th scope="col">Nombre</th>
						<th scope="col">Categoria</th>
						<th scope="col">Precio Factura</th>
						<th scope="col">Porcentaje</th>
						<th scope="col">Precio Venta</th> 
						<th scope="col">Cantidades</th> 
						<th scope="col">Operacion</th> 
					</tr>
				</thead>
				<tbody>
					@foreach($tablaprod as $tablaproduct)
						<tr>
							<td><img style="height: 50px; width: 50px" class="card-img-top" src="imagenes/{{$tablaproduct->imagenprod}}"></td>
							<td>{{$tablaproduct->codigo}}</td>
							<td>{{$tablaproduct->nombre}}</td>
							<td>{{$tablaproduct->categorianom->nombre}}</td>
							<td>{{$tablaproduct->precio_ini}}</td>
							<td>{{$tablaproduct->Porcentaje}} %</td>
							<td>{{$tablaproduct->precio_final}}</td>
							<td>{{$tablaproduct->cantidades}}</td>
							<td><a href="/productos/{{$tablaproduct->slug_pro}}/edit" class="btn btn-primary">Editar</a>
								<form  method="POST" action="/productos/{{$tablaproduct->slug_pro}}">
									@method('DELETE')
									@csrf
									<input type="submit" class="btn btn-danger" value="borrar">
								</form>
							</td>
						</tr>		
					@endforeach
				</tbody>
			</table>
			{{ $tablaprod->links() }}

		</div>
		<div class="col-2">
			@include('datcomunes.success')
			@include('datcomunes.error')
		</div>
	</div>
</div>


@endsection