<!-- resources/views/vendedor/transacciones.blade.php -->
@extends('layouts.master-usuarios')

@section('title', 'Transacciones')

@section('content')
<div class="container">
    <h1>Transacciones</h1>

    @if($transacciones->isEmpty())
        <p>No tienes transacciones aún.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID Transacción</th>
                    <th>Fecha</th>
                    <th>Productos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transacciones as $transaccion)
                    <tr>
                        <td>{{ $transaccion->id }}</td>
                        <td>{{ $transaccion->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <ul>
                                @foreach($transaccion->productos as $producto)
                                    @if($producto->propietario_id == Auth::id())
                                        <li>{{ $producto->nombre }} (Cantidad: {{ $producto->pivot->cantidad }})</li>
                                    @endif
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

