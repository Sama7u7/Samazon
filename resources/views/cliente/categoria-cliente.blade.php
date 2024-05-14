@extends('layouts.master-cliente')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')
    <div class="container">
        @if($usuario)
        <h1>Bienvenido, {{ $usuario->nombre }}</h1>
    @else
        <p>No se encontró un usuario para este token.</p>
    @endif
        
        <h1>Categorías</h1>

        <div class="row">
            @foreach ($categorias as $categoria)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('productosPorCategoria', ['categoria' => $categoria->id]) }}" class="card-link">
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
        <div style="height: 380px;"></div>
        
    </div>
    @endsection
