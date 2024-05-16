@extends('layouts.master-usuarios')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $producto->nombre }}</div>
                <div id="carousel{{ $producto->id }}" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($producto->imagenes as $key => $imagen)
                    <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                        <img src="{{ asset('images/productos/' . $imagen->nombre) }}" class="d-block mx-auto img-fluid" alt="{{ $producto->nombre }}">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carousel{{ $producto->id }}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel{{ $producto->id }}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
                <div class="card-body">
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
