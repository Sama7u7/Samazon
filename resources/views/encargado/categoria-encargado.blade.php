@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')
    <div class="container">
        
        <h1>Categorías</h1>

        <div class="row">
            @foreach ($categorias as $categoria)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('productosPorCategoriaencargado', ['categoria' => $categoria->id]) }}" class="card-link">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $categoria->nombre }}</h5>
                                <!-- Aquí puedes agregar más información de la categoría si lo deseas -->
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
    </div>
    @endsection