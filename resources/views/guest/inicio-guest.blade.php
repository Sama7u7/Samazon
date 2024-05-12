@extends('layouts.master-guest')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')
<div class="container">
    
<!-- En tu archivo de vista de la lista de productos -->

<div class="container">
    <br>
    <h3>Productos</h3>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        
                        <!-- Botón para ver más detalles -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#detalleProducto{{ $producto->id }}">Ver</button>
                        <a href="/login" class="btn btn-success">Anadir al carrito</a>
                    </div>
                </div>
            </div>

            <!-- Modal para mostrar los detalles del producto -->
            <div class="modal fade" id="detalleProducto{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="detalleProducto{{ $producto->id }}Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detalleProducto{{ $producto->id }}Label">Detalles del Producto</h5>
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
    </div>
</div>


        @endsection