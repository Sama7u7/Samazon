@extends('layouts.master-cliente')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')


<div class="container">
    <h1 align='center'>Bienvenido a Samazon</h1>
    <br>
    <h3>Productos</h1>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <!-- Agrega aquí cualquier otra información que desees mostrar -->
                        <!-- Por ejemplo: -->
                        <!-- <p class="card-text">Precio: ${{ $producto->precio }}</p> -->
                        <!-- <p class="card-text">Disponibilidad: {{ $producto->cantidad }}</p> -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
        @endsection