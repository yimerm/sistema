@extends('layouts.app')
@section('title','Proveedor')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page">Proveedor</li>
@endsection
@section('content')
 
<div class="container">
	<div class="row" style=" margin-top: 30px;"> 
		<div class="col-5 well">
		</div>
		<div align="right" class="col-4 well">
			<a class="btn btn-primary" href="{{route('proveedor.create')}}" role="button">+ Proveedor</a>
		</div> 
		<div class="col-3 well">
		</div>
	</div>
	<div class="row"> 
		<div class="col-10">
			
			<table class="table  table-hover">
				<thead style="color: #FFFFFF; background-color: #808080;"  >
					<tr>
						<th scope="col">Nombre De La Empresa</th>
						<th scope="col">Nombre Del Surtidor</th>
						<th scope="col">Celular</th>
						<th scope="col">Operacion</th>  
					</tr>
				</thead>
				<tbody>
					@foreach($proveedor as $proveedores)
						<tr>
							<td>{{$proveedores->nombre}}</td>
							<td>{{$proveedores->surtidor}}</td>
							<td>{{$proveedores->celular}}</td>
							<td><a href="/proveedor/{{$proveedores->slug_proveedor}}/edit" class="btn btn-primary">Editar</a>
								<form  method="POST" action="/proveedor/{{$proveedores->slug_proveedor}}">
									@method('DELETE')
									@csrf
									<input type="submit" class="btn btn-danger" value="borrar">
								</form>
							</td>
						</tr>		
					@endforeach
				</tbody>
			</table>
			{{ $proveedor->links() }}

		</div>
		<div class="col-2">
			@include('datcomunes.success')
			@include('datcomunes.error')
		</div>
	</div>
</div>


@endsection