@extends('layouts.master-usuarios')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>

    @if($carrito && $carrito->productos->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito->productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->pivot->cantidad }}</td>
                        <td>${{ $producto->precio }}</td>
                        <td>${{ $producto->precio * $producto->pivot->cantidad }}</td>
                        <td>
                            <form action="{{ route('carrito.eliminar', $producto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       <br>

        <div class="text-right">
            <h3>Total: ${{ $total }}</h3>
            <a href="{{ route('transaccion.verFormulario') }}" class="btn btn-success">Proceder al pago </a>
        </div>
    @else
        <p>Tu carrito está vacío.</p>
    @endif
</div>
<div style="width: 500px; height: 400px;"></div>

@endsection
