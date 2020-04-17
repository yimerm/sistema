@extends('layouts.app')
@section('title','Usuario')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
@endsection
@section('content')
 
<div class="container">
	<div class="row" style=" margin-top: 30px;"> 
		<div class="col-5 well">
		</div>
		<div align="right" class="col-4 well">
			<a class="btn btn-primary" href="{{route('user.create')}}" role="button">+ Usuarios</a>
		</div> 
		<div class="col-3 well">
		</div>
	</div>
	<div class="row"> 
		<div class="col-9">
			
			<table class="table  table-hover">
				<thead style="color: #FFFFFF; background-color: #808080;"  >
					<tr>
						<th scope="col">Foto</th>
						<th scope="col">Nombre</th>
						<th scope="col">Apellido</th>
						<th scope="col">Celular</th>
						<th scope="col">Direcion</th>
						<th scope="col">Monto deuda</th> 
						<th scope="col">Operacion</th> 
					</tr>
				</thead>
				<tbody>
					@foreach($tablaUsu as $tablaUsuarios)
						<tr>
							<td><img style="height: 50px; width: 50px" class="card-img-top" src="imagenes/{{$tablaUsuarios->imagenusu}}"></td>
							<td>{{$tablaUsuarios->nombre}}</td>
							<td>{{$tablaUsuarios->apellidos}}</td>
							<td>{{$tablaUsuarios->celular}}</td>
							<td>{{$tablaUsuarios->direcion}}</td>
							<td>{{$tablaUsuarios->monto_deuda}}</td>
							<td><a href="/user/{{$tablaUsuarios->slug}}/edit" class="btn btn-primary">Editar</a>
								<form  method="POST" action="/user/{{$tablaUsuarios->slug}}">
									@method('DELETE')
									@csrf
									<input type="submit" class="btn btn-danger" value="borrar">
								</form>
							</td>
						</tr>		
					@endforeach
				</tbody>
			</table>
			{{ $tablaUsu->links() }}

<<<<<<< HEAD
		</div>
		<div class="col-3">
			@include('datcomunes.success')
			@include('datcomunes.error')
		</div>
	</div>
=======
					<form method="POST" action="/user/{{$tablaUsuarios->slug}}">
						@method('DELETE')
						@csrf
						<input type="submit" class="btn btn-danger" value="borrar">
					</form>
				</td>
					
					
			</tr>		
		@endforeach
	  </tbody>
	</table>
>>>>>>> d4512e082b6cea62635af48641b0072dcd893ada
</div>


@endsection