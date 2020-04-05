	<div class="form-group">
		<label for="">Nombre</label>
		<input type="text" @isset($user->nombre) value="{{ $user->nombre }}" @endisset name="nombre" class="form-control">
	</div> 
	<div class="form-group">
		<label for="">Apellidos</label>
		<input type="text" @isset($user->apellidos) value="{{ $user->apellidos }}" @endisset name="apellidos" class="form-control">
	</div> 
	<div class="form-group">
		<label for=""># Celular</label>
		<input type="text" @isset($user->celular) value="{{ $user->celular }}" @endisset name="celular" class="form-control">
	</div> 
	<div class="form-group">
		<label for="">Direcion</label>
		<input type="text" @isset($user->direcion) value="{{ $user->direcion }}" @endisset name="direcion" class="form-control">
	</div> 
	<div class="form-group">
		<label for="">Monto deuda</label>
		<input type="number" @isset($user->monto_deuda) value="{{ $user->monto_deuda }}" @endisset name="monto_deuda" class="form-control">
	</div> 
	<div class="form-group">
		<label for="">slug</label>
		<input type="number" @isset($user->slug) value="{{ $user->slug }}" @endisset name="slug" class="form-control">
	</div> 
	<div class="form-group">
		<label for="">imagen</label>
		<input type="file" name="imagenusu" class="form-control">
	</div>