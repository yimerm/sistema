@extends('layouts.app')
@section('title','Crear Cliente')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('clientes.index')}}">Cliente</a></li>
<li class="breadcrumb-item active" aria-current="page">Crear</li>
@endsection

@section('content')

	<div class="container">
		<div class="row"  style=" margin-top: 50px;"> 
			<div class="col-8">
				<form class="form-group" method="POST" action="/clientes" enctype="multipart/form-data" autocomplete="off">
					@csrf
					@include('clientes.formcliente')
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