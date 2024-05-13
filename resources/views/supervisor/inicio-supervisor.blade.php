@extends('layouts.master-supervisor')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1>Hola supervisor</h1>
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
                <div class="card-header">Vendedores</div>
                <div class="card-body">
                    <!-- Contenido de los vendedores aquí -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection