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
                    <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
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