@extends('layouts.master-usuarios')

@section('content')
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Producto</div>

                    <div class="card-body">
                        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $producto->descripcion }}</textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control-file" id="imagen" name="imagen">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                        <br>
                          <!-- Mostrar imágenes existentes -->
@if ($producto->imagenes->isNotEmpty())
<div class="form-group">
    <label>Imágenes existentes</label>
    <div class="row">
        @foreach ($producto->imagenes as $imagen)
        <div class="col-md-3">
            <img src="{{ asset('images/productos/' . $imagen->nombre) }}" class="img-thumbnail" alt="Imagen Producto">
            <button type="button" class="btn btn-danger btn-sm mt-1" data-toggle="modal" data-target="#eliminarImagenModal{{ $imagen->id }}">Eliminar</button>
        </div>
        <!-- Modal de confirmación para eliminar la imagen -->
        <div class="modal fade" id="eliminarImagenModal{{ $imagen->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarImagenModalLabel{{ $imagen->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarImagenModalLabel{{ $imagen->id }}">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar esta imagen?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <!-- Formulario para enviar la solicitud de eliminación -->
                        <form action="{{ route('eliminar-imagen', $imagen->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
@endif

                            <!-- Otros campos del producto -->

                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
<br>
@endsection
