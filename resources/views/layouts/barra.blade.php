<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a  class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ingresar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('user.index')}}">Usuarios</a> 
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('clientes.index')}}">Clientes</a> 
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('categoria.index')}}">Categoria</a> 
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('productos.index')}}">Productos</a> 
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('proveedor.index')}}">Proveedor</a> 
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('entradafactura.index')}}">Inventario</a> 
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="">Disabled</a>
      </li>
    </ul>
  </div>
</nav>