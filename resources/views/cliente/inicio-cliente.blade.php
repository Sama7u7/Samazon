@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')


<div class="container">
    
    <br>
    <h1>Bienvenido, {{ session('nombre') }}</h1>
    
    <h3>Productos</h3>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
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
               
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <!-- Botón para ver más detalles -->
                        <a href="{{ route('productos.test', ['id' => $producto->id]) }}" class="btn btn-primary">Ver detalles</a>
                        <a href="#" class="btn btn-success">Anadir al carrito</a>
                    </div>
                </div>
            </div>

           
        @endforeach
    </div>
</div>
        @endsection