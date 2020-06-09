
	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Nombre de la Empresa</div>
			</div>
			<input type="text" @isset($proveedor->nombre) value="{{ $proveedor->nombre }}" @endisset name="nombre" class="form-control" placeholder="">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Nombre del Surtidor</div>
			</div>
			<input type="text" @isset($proveedor->surtidor) value="{{ $proveedor->surtidor }}" @endisset name="surtidor" class="form-control" placeholder="Nombre del Mercaderista">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Celular</div>
			</div>
			<input type="text" @isset($proveedor->celular) value="{{ $proveedor->celular }}" @endisset name="celular" class="form-control" placeholder="celular del Producto">
		</div>
	</div> 

	
