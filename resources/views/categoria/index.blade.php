@extends('layouts.app')
@section('title','Cliente')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page">Categoria</li>
@endsection
@section('content')
 
<div class="container">
	<div class="row" style=" margin-top: 30px;"> 
		<div class="col-5 well">
		</div>
		<div align="right" class="col-4 well">
			<a class="btn btn-primary" href="{{route('categoria.create')}}" role="button">+ Categoria</a>
		</div> 
		<div class="col-3 well">
		</div>
	</div>
	<div class="row"> 
		<div class="col-9">
			
			<table class="table  table-hover">
				<thead style="color: #FFFFFF; background-color: #808080;"  >
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Operacion</th> 
					</tr>
				</thead>
				<tbody>
					@foreach($categoria as $categorias)
						<tr>
							<td>{{$categorias->nombre}}</td>
							<td>
								<a href="/categoria/{{$categorias->slug_categoria}}/edit" class="btn btn-primary">Editar</a>
								<form  method="POST" action="/categoria/{{$categorias->slug_categoria}}">
									@method('DELETE')
									@csrf
									<input type="submit" class="btn btn-danger" value="borrar">
								</form>
							</td>
						</tr>		
					@endforeach
				</tbody>
			</table> 

		</div>
		<div class="col-3">
			@include('datcomunes.success')
			@include('datcomunes.error')

		</div>
	</div>
</div>


@endsection