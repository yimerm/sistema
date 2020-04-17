@extends('layouts.app')
@section('title','Crear Categoria')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('categoria.index')}}">Categoria</a></li>
<li class="breadcrumb-item active" aria-current="page">Crear</li>
@endsection

@section('content')

	<div class="container">
		<div class="row"  style=" margin-top: 50px;"> 
			<div class="col-8">
				<form class="form-group" method="POST" action="/categoria" enctype="multipart/form-data" autocomplete="off">
					@csrf
					@include('categoria.formcategoria')
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