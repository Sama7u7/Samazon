@extends('layouts.master-encargado')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Listado de Productos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Razon</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->estado }}</td>
                <td>{{ $producto->motivo }}</td>
                <td>
                    <a href="{{ route('productos.form', $producto->id) }}" class="btn btn-primary">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection