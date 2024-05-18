@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')
    <div class="container">
        <br>
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('cliente')}}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
  </ol>
</nav>
       <br>
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
