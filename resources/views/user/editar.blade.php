 @extends('layouts.app')
@section('title','inicio')

@section('content')
 
	<form class="form-group" method="POST" action="/user/{{$user->slug}}" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		@include('user.from_usuario')
		<button type="submit" class="btn btn-primary">editar</button>
	</form>

@endsection
  
	  
 