 @extends('layouts.app')
@section('title','Editar')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page"><a href="{{route('proveedor.index')}}">Proveedor</a></li>
<li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection
@section('content')
	<div class="container">
		<div class="row"  style=" margin-top: 50px;"> 
			<div class="col-8">
				<form class="form-group" method="POST" action="/proveedor/{{$proveedor->slug_proveedor}}" enctype="multipart/form-data" autocomplete="off">
					@method('PUT')
					@csrf
					@include('proveedor.fromproveeor')
					<button type="submit" class="btn btn-primary">Editar</button>
				</form>
			</div>
			<div class="col-4">
				@include('datcomunes.success')
				@include('datcomunes.error')
			</div>
		</div>
	</div>
	

@endsection