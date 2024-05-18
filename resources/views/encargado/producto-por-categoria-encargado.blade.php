@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')

    <div class="container">
        <div class="container">
            <h1>Productos de la categoría: {{ $categoria->nombre }}</h1>
            <div class="row">
                @forelse ($productos as $producto)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}" target="_blank">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <a href="#" class="btn btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <p>No hay productos disponibles en esta categoría.</p>
                    </div>
                @endforelse
            </div>
        </div>
        
    </div>
    @endsection