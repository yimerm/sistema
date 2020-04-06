@extends('layouts.app')
@section('title','inicio')

@section('content')
 
	  
<div class="row" style=" margin-top: 50px;" >
	<table class="table table-hover">
	  <thead class="thead-dark">
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

					<form method="POST" action="/user/{{$tablaUsuarios->slug}}">
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Borrar</button>
					</form>
				</td>
					
					
			</tr>		
		@endforeach
	  </tbody>
	</table>
</div>
	  

@endsection