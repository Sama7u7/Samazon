@extends('layouts.master-usuarios')

@section('content')
<div class="container">
    <h1>Pagos  pendientes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('contador.realizarPago') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Seleccionar</th>
                    <th>Vendedor ID</th>
                    <th>Vendedor Nombre</th>
                    <th>Productos</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productosAgrupadosPorVendedor as $vendedor)
                <tr>
                    <td>
                        <input type="checkbox" name="vendedores[]" value="{{ $vendedor['vendedor_id'] }}">
                    </td>
                    <td>{{ $vendedor['vendedor_id'] }}</td>
                    <td>{{ $vendedor['vendedor_nombre'] }}</td>
                    <td>
                        <ul>
                            @foreach($vendedor['productos'] as $producto)
                            <li>{{ $producto['nombre'] }} (Cantidad: {{ $producto['cantidad'] }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $vendedor['total'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Realizar Pago</button>
    </form>
</div>
@endsection
