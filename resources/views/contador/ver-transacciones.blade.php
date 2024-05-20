@extends('layouts.master-usuarios')

@section('content')
<div class="container">
    <h1>Transacciones</h1>

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
                <th>ID</th>
                <th>Usuario</th>
                <th>Monto</th>
                <th>Estado de Transacción</th>
                <th>Estado de Pago</th>
                <th>Fecha</th>
                <th>Detalles</th>
                <th>Voucher</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transacciones as $transaccion)
                <tr>
                    <td>{{ $transaccion->id }}</td>
                    <td></td>
                    <td>{{ $transaccion->monto }}</td>
                    <td>{{ ucfirst($transaccion->estado_transaccion) }}</td>
                    <td>{{ ucfirst($transaccion->estado_pago) }}</td>
                    <td>{{ $transaccion->created_at->format('d-m-Y') }}</td>
                    <td>
                        <ul>
                            @foreach($transaccion->productos as $producto)
                                <li>{{ $producto->nombre }} - Cantidad: {{ $producto->pivot->cantidad }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                    {{-- php artisan storage:link comando para linkear de storage/app/public/vouchers/voucher.png  a storage/vouchers/voucher.png--}}
                      @if($transaccion->voucher)
                        <a href="{{ asset('storage/' . $transaccion->voucher) }}" target="_blank">Ver Voucher</a>
                      @else
                         No disponible
                     @endif
                    </td>
                        
                    <td>
                    @if($transaccion->estado_transaccion != 'validada' && $transaccion->estado_transaccion != 'en-envio' && $transaccion->estado_transaccion != 'entregado')
   
                        <form action="{{ route('contador.validar-transaccion', $transaccion->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Validar</button>
                        </form>
                        <form action="{{ route('contador.rechazar-transaccion', $transaccion->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </form>
                       
                        @else
                            Validada
                            
                        <form action="{{ route('contador.en-envio-transaccion', $transaccion->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">En envio</button>
                        </form>
                        <form action="{{ route('contador.enviado-transaccion', $transaccion->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Entregado</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><br><br><br><br><br><br>
@endsection
