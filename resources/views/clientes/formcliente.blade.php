<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Nombre</div>
			</div>
			<input type="text" @isset($cliente->nombre) value="{{ $cliente->nombre }}" @endisset name="nombre" class="form-control" placeholder="Nombre">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Apellidos</div>
			</div>
			<input type="text" @isset($cliente->apellidos) value="{{ $cliente->apellidos }}" @endisset name="apellidos" class="form-control" placeholder="Apellidos">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">#Celular</div>
			</div>
			<input type="text" @isset($cliente->celular) value="{{ $cliente->celular }}" @endisset name="celular" class="form-control" placeholder="#Celular">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Direccion</div>
			</div>
			<input type="text" @isset($cliente->direcion) value="{{ $cliente->direcion }}" @endisset name="direcion" class="form-control" placeholder="ej: calle X # XX-XX Barrio X">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Monto del credito</div>
			</div>
			<input type="number" @isset($cliente->monto_deuda) value="{{ $cliente->monto_deuda }}" @endisset name="monto_deuda" class="form-control" placeholder="ej: Deuda maxima $ 450.000">
		</div>
	</div> 

 	

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Imagen</div>
			</div>
			<input type="file"  name="imagencliente" class="form-control">
		</div>
	</div>

