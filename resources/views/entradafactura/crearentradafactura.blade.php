@extends('layouts.app')
@section('title','Creando Facturas')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('clientes.index')}}">Cliente</a></li>
<li class="breadcrumb-item active" aria-current="page">Crear</li>
@endsection

@section('content')

	<div>
		<div class="row" > 
			<div class="col-10">
				<form class="form-group" method="POST" action="/entradafactura" enctype="multipart/form-data" autocomplete="off">
					@csrf
					@include('entradafactura.formentradafactura')
					<button type="submit" class="btn btn-primary">GUARDAR</button>
				</form>
			</div>
			<div class="col-2">
				
			</div>
		</div>
	</div>


@endsection