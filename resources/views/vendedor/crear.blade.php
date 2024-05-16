@extends('layouts.master-usuarios')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Nuevo Producto</div>

                    <div class="card-body">
                        <form action="{{ route('vendedor.store.product') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="categoria_id">Categoría</label>
                                <select class="form-control" id="categoria_id" name="categoria_id" required>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="imagenes">Imágenes</label>
                                <input type="file" class="form-control-file" id="imagenes" name="imagenes[]" multiple>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">Guardar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
