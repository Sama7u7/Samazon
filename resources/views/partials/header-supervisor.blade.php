
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SAMAZON</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" href="/supervisor">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Historial</a>
        </li>
        
      </ul>
      <ul class="navbar-nav mr-auto"> <!-- Movido a la izquierda -->
      <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="text-center">
                            @csrf <!-- Agrega el token CSRF -->
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ session('email') }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Otra opcion</a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" class="text-center">
                    @csrf <!-- Agrega el token CSRF -->
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </li>
        
    </ul>
    </div>
  </div>
</nav>