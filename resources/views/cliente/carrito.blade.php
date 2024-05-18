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
                @foreach($carrito as $id => $detalles)
                    <tr data-id="{{ $id }}">
                        <td>{{ $detalles['nombre'] }}</td>
                        <td>
                            <!-- Sumador para ajustar la cantidad -->
                            <div class="input-group">
                                
                                <input type="text" class="form-control cantidad" value="{{ $detalles['cantidad'] }}" data-id="{{ $id }}" readonly>
                                
                            </div>
                        </td>
                        <td class="precio">${{ $detalles['precio'] }}</td>
                        <td class="subtotal">${{ $detalles['precio'] * $detalles['cantidad'] }}</td>
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
        <div class="d-flex justify-content-end">
            <h4>Total: $<span id="total">{{ $total }}</span></h4>
        </div>
    @else
        <p>Tu carrito está vacío.</p>
    @endif
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const incrementarBotones = document.querySelectorAll('.incrementar');
        const decrementarBotones = document.querySelectorAll('.decrementar');
        const totalElement = document.getElementById('total');

        incrementarBotones.forEach(boton => {
            boton.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const inputCantidad = document.querySelector(`input[data-id="${id}"]`);
                inputCantidad.value = parseInt(inputCantidad.value) + 1;
                actualizarSubtotal(id, inputCantidad.value);
                actualizarTotal();
            });
        });

        decrementarBotones.forEach(boton => {
            boton.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const inputCantidad = document.querySelector(`input[data-id="${id}"]`);
                const cantidad = parseInt(inputCantidad.value);
                if (cantidad > 1) {
                    inputCantidad.value = cantidad - 1;
                    actualizarSubtotal(id, inputCantidad.value);
                    actualizarTotal();
                }
            });
        });

        function actualizarSubtotal(id, cantidad) {
            const fila = document.querySelector(`tr[data-id="${id}"]`);
            const precio = parseFloat(fila.querySelector('.precio').innerText.replace('$', ''));
            const subtotal = fila.querySelector('.subtotal');
            subtotal.innerText = `$${(precio * cantidad).toFixed(2)}`;
        }

        function actualizarTotal() {
            let total = 0;
            const subtotales = document.querySelectorAll('.subtotal');
            subtotales.forEach(subtotal => {
                total += parseFloat(subtotal.innerText.replace('$', ''));
            });
            totalElement.innerText = total.toFixed(2);
        }
    });
</script>
@endsection
