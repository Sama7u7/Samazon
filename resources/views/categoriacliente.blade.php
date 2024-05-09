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
        <h1>Lista de Categorías</h1>

        <div class="row">
            @foreach ($categorias as $categoria)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('productosPorCategoria', ['categoria' => $categoria->id]) }}" class="card-link">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $categoria->nombre }}</h5>
                                <!-- Aquí puedes agregar más información de la categoría si lo deseas -->
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
    </div>
</body>
</html>