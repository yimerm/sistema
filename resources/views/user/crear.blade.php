@extends('layouts.app')
@section('title','inicio')

@section('content')
 
	<form class="form-group" method="POST" action="/user" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombre" class="form-control">
		</div> 
		<div class="form-group">
			<label for="">Apellidos</label>
			<input type="text" name="apellidos" class="form-control">
		</div> 
		<div class="form-group">
			<label for=""># Celular</label>
			<input type="text" name="celular" class="form-control">
		</div> 
		<div class="form-group">
			<label for="">Direcion</label>
			<input type="text" name="direcion" class="form-control">
		</div> 
		<div class="form-group">
			<label for="">Monto deuda</label>
			<input type="number" name="monto_deuda" class="form-control">
		</div> 
		<div class="form-group">
			<label for="">imagen</label>
			<input type="file" name="imagenusu" >
		</div>
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>

@endsection