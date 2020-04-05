@extends('layouts.app')
@section('title','inicio')

@section('content')
 
	<form class="form-group" method="POST" action="/user" enctype="multipart/form-data">
		@csrf
		@include('user.from_usuario')
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>

@endsection