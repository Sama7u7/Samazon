@extends('layouts.master-usuarios')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $producto->nombre }}</div>

                <div class="card-body">
                <img src="{{ asset('images/productos/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}" style="max-width: 200px;">
                    <p>{{ $producto->descripcion }}</p>
                    <p>Cantidad disponible: {{ $producto->cantidad }}</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Preguntas y Respuestas</div>

                <div class="card-body">
                    <!-- Mostrar preguntas y respuestas -->
                    @if ($producto->preguntas)
                    <!-- Iterar sobre las preguntas solo si hay alguna -->
                    @foreach ($producto->preguntas as $pregunta)
                        <div class="mb-3">
                            <p><strong>Pregunta:</strong> {{ $pregunta->content }}</p>
                            @if ($pregunta->answer)
                                <p><strong>Respuesta:</strong> {{ $pregunta->answer->content }}</p>
                            @else
                                <p><em>Aún no hay respuesta</em></p>
                            @endif
                        </div>
                    @endforeach
                @else
                    <!-- Mostrar un mensaje si no hay preguntas -->
                    <p>No hay preguntas asociadas a este producto.</p>
                @endif
                    <!-- Formulario para hacer una nueva pregunta -->
                    <form action="{{ route('preguntas.store') }}" method="POST">
                        @csrf
                    
                        <div class="form-group">
                            <label for="content">Pregunta</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                        </div>
                    
                        <!-- Agrega un campo oculto para el ID del producto -->
                        <input type="hidden" name="product_id" value="{{ $producto->id }}">
                    <br>
                        <button type="submit" class="btn btn-primary">Enviar Pregunta</button>
                    </form>
                </div>
            </div>
        </div>
      
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div style="height: 200px;"></div>
</div>
@endsection
