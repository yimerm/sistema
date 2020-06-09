 
	<div class="form-group"> 
		<div class="input-group input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">Codigo Factura</div>
			</div>
			<input type="text" @isset($entradafactura->codigo) value="{{ $entradafactura->codigo }}" @endisset name="codigo" class="form-control" placeholder="Codigo Factura">
		 
			<div class="input-group-prepend">
				<div class="input-group-text">Proveedor</div>
			</div>
			<select name="proveedor" id="proveedor" class="form-control" >
				<option value="">-Escoja un proveedor</option>
				@foreach($proveedor as $proveedors)

					<option value="{{ $proveedors['id']}}">{{ $proveedors['nombre']}}</option>

				@endforeach
			</select>
		</div>
	</div>