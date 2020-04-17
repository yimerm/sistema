@extends('layouts.app')
@section('title','Cliente')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page">Clientes</li>
@endsection
@section('content')
 
<div class="container">
	<div class="row" style=" margin-top: 30px;"> 
		<div class="col-5 well">
		</div>
		<div align="right" class="col-4 well">
			<a class="btn btn-primary" href="{{route('clientes.create')}}" role="button">+ Clientes</a>
		</div> 
		<div class="col-3 well">
		</div>
	</div>
	<div class="row"> 
		<div class="col-9">
			
			<table class="table  table-hover">
				<thead style="color: #FFFFFF; background-color: #808080;"  >
					<tr>
						<th scope="col">Imagen</th>
						<th scope="col">Nombre</th>
						<th scope="col">Apellido</th>
						<th scope="col">Celular</th>
						<th scope="col">Direcion</th>
						<th scope="col">Monto deuda</th>
						<th scope="col">Operacion</th> 
					</tr>
				</thead>
				<tbody>
					@foreach($tablacliente as $tablaclien)
						<tr>
							<td><img style="height: 50px; width: 50px" class="card-img-top" src="imagenes/{{$tablaclien->imagencliente}}"></td>
							<td>{{$tablaclien->nombre}}</td>
							<td>{{$tablaclien->apellidos}}</td>
							<td>{{$tablaclien->celular}}</td>
							<td>{{$tablaclien->direcion}}</td>
							<td>{{$tablaclien->monto_deuda}}</td>
							<td><a href="/clientes/{{$tablaclien->slug_clientes}}/edit" class="btn btn-primary">Editar</a>
								<form  method="POST" action="/clientes/{{$tablaclien->slug_clientes}}">
									@method('DELETE')
									@csrf
									<input type="submit" class="btn btn-danger" value="borrar">
								</form>
							</td>
						</tr>		
					@endforeach
				</tbody>
			</table>
			{{ $tablacliente->links() }}

		</div>
		<div class="col-3">
			@include('datcomunes.success')
			@include('datcomunes.error')

		</div>
	</div>
</div>


@endsection