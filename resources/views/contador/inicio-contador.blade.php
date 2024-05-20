@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')
<br>
<div class="container">
    <br>
<h1>Bienvenido, {{ session('nombre') }}</h1>
    <H3> Este es el apartado del contador</H3>
    <br>
    <div class="container mt-4"> <!-- Contenedor principal con un margen superior -->
    <div class="row justify-content-center"> <!-- Fila centrada en el contenedor principal -->
        <div class="col-md-8"> <!-- Columna de tamaño medio (8 columnas de ancho en pantallas medianas) -->
            <div class="card"> <!-- Tarjeta que contiene las acciones CRUD -->
                <div class="card-header">Acciones del contador</div> <!-- Encabezado de la tarjeta -->
                <div class="card-body"> <!-- Cuerpo de la tarjeta -->
                    <div class="row text-center"> <!-- Fila centrada para los botones -->
                        <div class="col-md-12 mb-3"> <!-- Columna de tamaño medio (4 columnas de ancho en pantallas medianas) con margen inferior -->
                            <a href="{{ route('contador.ver-transacciones') }}" class="btn btn-primary btn-lg">Validar transacciones</a> <!-- Botón "Crear" -->
                            <a type="button"href="{{ route('historial-pagos') }}" class="btn btn-warning btn-lg">Historial de pagos</a>
                            <a type="button"href="{{ route('contador.productos-vendidos') }}" class="btn btn-success btn-lg">Crear pagos</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        
       

@endsection