@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')
<div class="container">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Principal</li>
        </ol>
    </nav>
    <br>
    <h1>Bienvenido, {{ session('nombre') }}</h1>
    <br>

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h3>Productos</h3>
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if($producto->imagenes->isNotEmpty())
                <div id="carousel{{ $producto->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($producto->imagenes as $key => $imagen)
                        <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                            <img src="{{ asset('images/productos/' . $imagen->nombre) }}" class="d-block mx-auto img-fluid" alt="{{ $producto->nombre }}" style="max-width: 200px; margin: 0 auto;">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel{{ $producto->id }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel{{ $producto->id }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @else
                <p>No hay imágenes disponibles para este producto.</p>
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <p class="card-text">Existencias: {{ $producto->cantidad }}</p>
                    <p class="card-text">${{ $producto->precio }}</p>
                    <!-- Botón para ver más detalles -->
                    <a href="{{ route('productos.test', ['id' => $producto->id]) }}" class="btn btn-primary">Ver detalles</a>
                    <!-- Botón para añadir al carrito -->
                    <form action="{{ route('carrito.agregar', ['productoId' => $producto->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Añadir al carrito</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
