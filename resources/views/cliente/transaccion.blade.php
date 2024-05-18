@extends('layouts.master-usuarios')

@section('title', 'Transacción')

@section('content')
<div class="container">
    <br>
    <h1>YA CASI LO TIENES!!</h1>
    <br>
    <h3>Esto es lo que compras</h3>
    @if($productos->isEmpty())
        <p>No hay productos en tu carrito.</p>
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
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->pivot->cantidad }}</td>
                        <td>${{ $producto->precio }}</td>
                        <td>${{ $producto->precio * $producto->pivot->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total: ${{ $total }}</h3>
    @endif
    <br>
    <form action="{{ route('transaccion.crear') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="voucher">Sube tu voucher de pago:</label>
            <input type="file" class="form-control" id="voucher" name="voucher" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Realizar Transacción</button>
    </form>
</div>
@endsection
