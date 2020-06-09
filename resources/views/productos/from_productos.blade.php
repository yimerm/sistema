	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Categoria</div>
			</div>
			<select name="categoria" id="categoria" class="form-control" >
				<option value="">-Escoja una categoria</option>
				@foreach($categorias as $categoria)
				<option value="{{ $categoria['id']}}">{{ $categoria['nombre']}}</option>
						
				@endforeach

			</select>
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Codigo de Barra</div>
			</div>
			<input type="text" @isset($producto->codigo) value="{{ $producto->codigo }}" @endisset name="codigo" class="form-control" placeholder="">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Nombre</div>
			</div>
			<input type="text" @isset($producto->nombre) value="{{ $producto->nombre }}" @endisset name="nombre" class="form-control" placeholder="Nombre del Producto">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Precio Inicial</div>
			</div>
			<input type="text" @isset($producto->precio_ini) value="{{ $producto->precio_ini }}" @endisset name="precio_ini" class="form-control" placeholder="Precio a como sale en la factura">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Porcentaje</div>
			</div>
			<input type="text" @isset($producto->Porcentaje) value="{{ $producto->Porcentaje }}" @endisset name="Porcentaje" class="form-control" placeholder="">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Precio Final</div>
			</div>
			<input type="text" @isset($producto->precio_final) value="{{ $producto->precio_final }}" @endisset name="precio_final" class="form-control" placeholder="precio al publico">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Cantidades</div>
			</div>
			<input type="text" @isset($producto->cantidades) value="{{ $producto->cantidades }}" @endisset name="cantidades" class="form-control" placeholder="">
		</div>
	</div> 

	<div class="form-group"> 
		<div class="input-group input-group-lg">
			<div class="input-group-prepend">
				<div class="input-group-text">Imagen</div>
			</div>
			<input type="file" name="imagenprod" class="form-control" >
		</div>
	</div>  