<div class="form-group"> 
		<div class="input-group input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">Nombre Categoria</div>
			</div>
			<input type="text" @isset($categoria->nombre) value="{{$categoria->nombre }}" @endisset name="nombre" class="form-control" placeholder="Nombre Categoria" required>
		</div>
</div> 
