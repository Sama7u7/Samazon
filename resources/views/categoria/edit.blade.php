@extends('layouts.app') <!-- Importa la plantilla principal -->

@section('content') <!-- Sección específica para el contenido -->
<div class="container">
    <br>
<h1>Formulario editar categorias</h1>
<br>
<div class="container">
    <div class="card"> <!-- Tarjeta para el formulario -->
        <div class="card-header">Editar Categoría</div> <!-- Encabezado de la tarjeta -->
        <div class="card-body"> <!-- Cuerpo de la tarjeta -->
            <!-- Formulario para editar la categoría -->
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                @csrf <!-- Agrega el token CSRF -->
                @method('PUT') <!-- Método para indicar que se usará PUT para actualizar -->

                <div class="form-group">
                    <label for="nombre">Nombre de la Categoría:</label>
                    <br>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}">
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection <!-- Fin de la sección de contenido -->
