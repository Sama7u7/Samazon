<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Samazon</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto"> <!-- Movido a la derecha -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cliente') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categorias.index2') }}">Categorías</a>
                </li>
            </ul>
        </div>
        <div> 
            <ul class="navbar-nav mr-auto"> <!-- Movido a la izquierda -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Cambiar contraseña</a>
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