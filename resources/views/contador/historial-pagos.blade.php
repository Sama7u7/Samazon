@extends('layouts.master-usuarios')

@section('content')
<div class="container">
    <h1>Historial de Pagos</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Transacción</th>
                <th>Producto</th>
                <th>Propietario</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Estado de Pago</th>
                <th>Fecha de Transacción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productosVendidos as $productoVendido)
                <tr>
                    <td>{{ $productoVendido->transaction_id }}</td>
                    <td>{{ $productoVendido->producto->nombre }}</td>
                    <td>{{ $productoVendido->producto->propietario->name }}</td>
                    <td>{{ $productoVendido->cantidad }}</td>
                    <td>{{ $productoVendido->producto->precio }}</td>
                    <td>{{ $productoVendido->cantidad * $productoVendido->producto->precio }}</td>
                    <td>{{ ucfirst($productoVendido->estado_pago) }}</td>
                    <td>{{ $productoVendido->transaction->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
