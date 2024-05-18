@extends('layouts.master-usuarios')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>

    @if(session('carrito'))
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
                @foreach(session('carrito') as $id => $detalles)
                    <tr>
                        <td>{{ $detalles['nombre'] }}</td>
                        <td>{{ $detalles['cantidad'] }}</td>
                        <td>${{ $detalles['precio'] }}</td>
                        <td>${{ $detalles['precio'] * $detalles['cantidad'] }}</td>
                        <td>
                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tu carrito está vacío.</p>
    @endif
</div>
@endsection
