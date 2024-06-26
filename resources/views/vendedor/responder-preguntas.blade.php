@extends('layouts.master-usuarios')

@section('content')
    <div class="container">
        <h1>Preguntas de los Productos del Vendedor</h1>

        @if ($preguntas->isEmpty())
    <p>No hay preguntas para ninguno de tus productos.</p>
@else
    <ul>
        @foreach ($preguntas as $pregunta)
            <li>
                <p><strong>Producto:</strong> {{ $pregunta->producto->nombre }}</p>
                <p><strong>Pregunta:</strong> {{ $pregunta->pregunta }}</p>
                <p><strong>Usuario que preguntó:</strong> {{ $pregunta->usuario->nombre }}</p>
                @if ($pregunta->respuesta)
                    <p><strong>Respuesta:</strong> {{ $pregunta->respuesta }}</p>
                @else
                    <form action="{{ route('guardar-respuesta', $pregunta->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="respuesta">Responder:</label>
                            <textarea class="form-control" id="respuesta" name="respuesta" rows="3" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Enviar respuesta</button>
                        
                    </form>
                @endif
            </li>
            <br>
        @endforeach
    </ul>
    
@endif
<br> 
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 <!-- Espacio adicional -->
 <div style="height: 500px;"></div>
@endsection


