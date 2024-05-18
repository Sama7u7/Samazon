@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <br>
<h1>Bienvenido, {{ session('nombre') }}</h1>
            
        </div>
    </div>
</div>

<div class="container mt-4"> <!-- Contenedor principal con un margen superior -->
    <div class="row justify-content-center"> <!-- Fila centrada en el contenedor principal -->
        <div class="col-md-8"> <!-- Columna de tamaño medio (8 columnas de ancho en pantallas medianas) -->
            <div class="card"> <!-- Tarjeta que contiene las acciones CRUD -->
                <div class="card-header">Acciones CRUD para categorías</div> <!-- Encabezado de la tarjeta -->
                <div class="card-body"> <!-- Cuerpo de la tarjeta -->
                    <div class="row text-center"> <!-- Fila centrada para los botones -->
                        <div class="col-md-6 mb-3"> <!-- Columna de tamaño medio (4 columnas de ancho en pantallas medianas) con margen inferior -->
                            <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-lg">Crear</a> <!-- Botón "Crear" -->
                        </div>
                        <div class="col-md-6 mb-3"> <!-- Columna de tamaño medio (4 columnas de ancho en pantallas medianas) con margen inferior -->
                            <a href="{{ route('categorias.index') }}" class="btn btn-success btn-lg">Leer</a> <!-- Botón "Leer" -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Últimas Transacciones</div>
                <div class="card-body">
                    <!-- Contenido de las últimas transacciones aquí -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Acciones de Usuarios</div>
                <div class="card-body text-center"> <!-- Añadido text-center -->
                    <div class="mb-3">
                        <a href="{{ route('usuarios.crear') }}" class="btn btn-primary btn-lg btn-block">Crear Usuario</a> <!-- Agregado btn-lg y btn-block -->
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-success btn-lg btn-block">Listar Usuarios</a> <!-- Agregado btn-lg y btn-block -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Productos no consignados</div>
                <div class="card-body">
                    <!-- Contenido de los vendedores aquí -->
                    <style>
                        .ver-btn {
                            width: 100%;
                        }
                    </style>
                    
                    <ul>
                        @foreach($productos as $producto)
                            <li>
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
                                <h5>{{ $producto->nombre }}</h5>
                                <p>{{ $producto->descripcion }}</p>
                                <!-- Botón para ver más detalles -->
                                <button class="btn btn-primary ver-btn" data-toggle="modal" data-target="#detalleProducto{{ $producto->id }}">Ver</button>
                            </li>

                            <div class="modal fade" id="detalleProducto{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="detalleProducto{{ $producto->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detalleProducto{{ $producto->id }}Label">Kardex del Producto</h5>
                                           
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Incluir la vista detalle-producto.blade.php para mostrar los detalles del producto -->
                                            @include('detalle-producto', ['producto' => $producto])
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
            
        </div>
        
    </div>
</div>


@endsection