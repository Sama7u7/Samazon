@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')
<div class="container mt-4">
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.edit', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="consignado" {{ $producto->estado === 'consignado' ? 'selected' : '' }}>Consignado</option>
                <option value="propuesto" {{ $producto->estado === 'propuesto' ? 'selected' : '' }}>Propuesto</option>
            </select>
        </div>
        <div class="form-group">
            <label for="motivo">Motivo:</label>
            <input type="text" name="motivo" id="motivo" class="form-control" value="{{ $producto->motivo }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<div style="height: 450px;"></div>
@endsection