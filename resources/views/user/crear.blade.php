@extends('layouts.app')
@section('title','inicio')

@section('content')
 	
 	@if($errors->any())
 	<div class="alert alert-danger">
 		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
 		</ul>
 	</div> 
 		
 	@endif
	<form class="form-group" method="POST" action="/user" enctype="multipart/form-data">
		@csrf
		@include('user.from_usuario')
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>

@endsection