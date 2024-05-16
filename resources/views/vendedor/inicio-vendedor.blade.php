@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')



    <div class="container">
    <br>
<h1>Bienvenido, {{ session('nombre') }}</h1>
    <H3> Este es el apartado del vendedor</H3>
    <br>
    <div class="container mt-4"> <!-- Contenedor principal con un margen superior -->
    <div class="row justify-content-center"> <!-- Fila centrada en el contenedor principal -->
        <div class="col-md-8"> <!-- Columna de tamaño medio (8 columnas de ancho en pantallas medianas) -->
            <div class="card"> <!-- Tarjeta que contiene las acciones CRUD -->
                <div class="card-header">Preguntas a productos</div> <!-- Encabezado de la tarjeta -->
                <div class="card-body"> <!-- Cuerpo de la tarjeta -->
                    <div class="row text-center"> <!-- Fila centrada para los botones -->
                        <div class="col-md-12 mb-3"> <!-- Columna de tamaño medio (4 columnas de ancho en pantallas medianas) con margen inferior -->
                            <a href="{{ route('preguntas-vendedor') }}" class="btn btn-primary btn-lg">Ver preguntas</a> <!-- Botón "Crear" -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<h3>Tus productos</h3>

<div class="row">
    @foreach ($productos as $producto)
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
                <p class="card-text">{{ $producto->estado }}</p>
                <p class="card-text">{{ $producto->motivo }}</p>
                <center>
                <!-- Agrega más detalles del producto según sea necesario -->
                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary"> Ver o editar detalles del producto</a>
                <br>
                <br>
                <!-- Botón para eliminar el producto -->
                <button class="btn btn-danger" data-toggle="modal" data-target="#eliminarProductoModal{{ $producto->id }}">Eliminar producto</button>
</center>
                <!-- Modal de confirmación de eliminación -->
                <div class="modal fade" id="eliminarProductoModal{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarProductoModalLabel{{ $producto->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminarProductoModalLabel{{ $producto->id }}">Eliminar producto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Estás seguro que deseas eliminar este producto?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

    
    
    @endsection