@extends('layouts.master-usuarios')

@section('title', 'Mis Compras')

@section('content')
<div class="container">
    <h1>Mis Compras</h1>

    @if($transacciones->isEmpty())
        <p>No has realizado ninguna compra aún.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID Transacción</th>
                    <th>Fecha</th>
                    <th>Estado de Transacción</th>
                    <th>Monto Total</th>
                    <th>Calificación</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transacciones as $transaccion)
                    <tr>
                        <td>{{ $transaccion->id }}</td>
                        <td>{{ $transaccion->created_at->format('d-m-Y H:i') }}</td>
                        <td>{{ ucfirst(str_replace('-', ' ', $transaccion->estado_transaccion)) }}</td>
                        <td>${{ number_format($transaccion->monto, 2) }}</td>
                        <td>
                            @if($transaccion->calificacion)
                                {{ $transaccion->calificacion }} estrellas
                            @else
                                <!-- Botón para abrir el modal de calificación -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#calificarModal{{ $transaccion->id }}">
                                    Calificar
                                </button>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('transaccion.detalles', $transaccion->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </td>
                    </tr>
                    <!-- Modal de Calificación -->
                    <div class="modal fade" id="calificarModal{{ $transaccion->id }}" tabindex="-1" role="dialog" aria-labelledby="calificarModalLabel{{ $transaccion->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="calificarModalLabel{{ $transaccion->id }}">Calificar Transacción</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('transacciones.calificar', $transaccion->id) }}" method="POST">
                                        @csrf
                                        <div class="rating">
                                            <input type="radio" name="rating" id="star5_{{ $transaccion->id }}" value="5">
                                            <label for="star5_{{ $transaccion->id }}">☆</label>
                                            <input type="radio" name="rating" id="star4_{{ $transaccion->id }}" value="4">
                                            <label for="star4_{{ $transaccion->id }}">☆</label>
                                            <input type="radio" name="rating" id="star3_{{ $transaccion->id }}" value="3">
                                            <label for="star3_{{ $transaccion->id }}">☆</label>
                                            <input type="radio" name="rating" id="star2_{{ $transaccion->id }}" value="2">
                                            <label for="star2_{{ $transaccion->id }}">☆</label>
                                            <input type="radio" name="rating" id="star1_{{ $transaccion->id }}" value="1">
                                            <label for="star1_{{ $transaccion->id }}">☆</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Enviar Calificación</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }
    .rating input {
        display: none;
    }
    .rating label {
        position: relative;
        width: 1em;
        font-size: 3rem;
        color: #888;
        cursor: pointer;
    }
    .rating label::before {
        content: "\2605";
        position: absolute;
        opacity: 0;
        transition: opacity 0.2s;
    }
    .rating label:hover:before,
    .rating label:hover ~ label:before {
        opacity: 1;
    }
    .rating input:checked ~ label,
    .rating:not(:checked) > label:hover,
    .rating:not(:checked) > label:hover ~ label {
        color: #FFD700;
    }
    .rating input:checked + label:hover,
    .rating input:checked ~ label:hover,
    .rating label:hover ~ input:checked ~ label,
    .rating input:checked ~ label:hover ~ label {
        color: #FFD700;
    }
</style>
@endsection
