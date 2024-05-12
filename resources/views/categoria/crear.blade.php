@extends('layouts.masterSupervisor')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Formulario para crear categorías</div>
                    <div class="card-body">
                        <form action="{{ route('categorias.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre_id" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_id" name="nombre" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
