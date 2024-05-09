<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('encabezados.header-clientes')
    <div class="container">
        

        <div class="container">
            <h1>Productos de la categoría: {{ $categoria->nombre }}</h1>
            <div class="row">
                @forelse ($productos as $producto)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}" target="_blank">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">{{ $producto->descripcion }}</p>
                                <a href="#" class="btn btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <p>No hay productos disponibles en esta categoría.</p>
                    </div>
                @endforelse
            </div>
        </div>
        
    </div>
</body>
</html>