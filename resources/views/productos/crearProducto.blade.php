@extends('layouts.app')
@section('title','Productos')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('productos.index')}}">Producto</a></li>
<li class="breadcrumb-item active" aria-current="page">Crear</li>
@endsection

@section('content')

	<div class="container">
		<div class="row"  style=" margin-top: 50px;"> 
			<div class="col-8">
				<form class="form-group" method="POST" action="/productos" enctype="multipart/form-data" autocomplete="off">
					@csrf
					@include('productos.from_productos')
					<button type="submit" class="btn btn-primary">GUARDAR</button>
				</form>
			</div>
			<div class="col-4">
				@include('datcomunes.success')
				@include('datcomunes.error')
			</div>
		</div>
	</div>


@endsection