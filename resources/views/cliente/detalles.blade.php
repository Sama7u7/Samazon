@extends('layouts.master-usuarios')

@section('title', 'Detalles de la Transacción')

@section('content')
<div class="container">
    <br>
    <h1>Detalles de la Transacción #{{ $transaccion->id }}</h1>

    <div class="card">
        <div class="card-header">
            <h4>Información de la Transacción</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $transaccion->id }}</p>
            <p><strong>Fecha:</strong> {{ $transaccion->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Estado de Transacción:</strong> {{ ucfirst(str_replace('-', ' ', $transaccion->estado_transaccion)) }}</p>
            <p><strong>Monto Total:</strong> ${{ number_format($transaccion->monto, 2) }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Productos</h4>
        </div>
        <div class="card-body">
            @if($transaccion->productos->isEmpty())
                <p>No hay productos en esta transacción.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaccion->productos as $producto)
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->pivot->cantidad }}</td>
                                <td>${{ number_format($producto->precio, 2) }}</td>
                                <td>${{ number_format($producto->precio * $producto->pivot->cantidad, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            
        </div>
    </div>
    <br>
    <br>
    <br>
</div>
@endsection
