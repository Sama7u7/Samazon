@extends('layouts.master-usuarios')

@section('content')
<div class="container">
    <h1>Transacciones</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID de Transacción</th>
                <th>Usuario</th>
                <th>Voucher</th>
                <th>Estado de Transacción</th>
                <th>Estado de Pago</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transacciones as $transaccion)
                <tr>
                    <td>{{ $transaccion->id }}</td>
                    <td>{{ $transaccion->usuario->name }}</td>
                    <td>
                        @if($transaccion->voucher)
                        <a href="{{ asset('storage/' . $transaccion->voucher) }}" target="_blank">Ver Voucher</a>
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>{{ $transaccion->estado_transaccion }}</td>
                    <td>{{ $transaccion->estado_pago }}</td>
                    <td>
                        <ul>
                            @foreach($transaccion->productos as $producto)
                                <li>{{ $producto->nombre }} - Cantidad: {{ $producto->pivot->cantidad }} - Precio: {{ $producto->precio }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
