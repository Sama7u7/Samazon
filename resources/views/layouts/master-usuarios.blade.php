<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Aquí puedes agregar tus estilos CSS -->
    <link href="{{ asset('css/style3.css') }}"  rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <!-- Aquí puedes agregar el contenido del encabezado que se repetirá en todas las páginas -->
       <!-- Navbar dinámica -->
       @if(Auth::check())
       @switch(Auth::user()->role)
           @case('cliente')
               @include('partials.navbar-clientes')
               @break
           @case('supervisor')
                @include('partials.header-supervisor')
                @break
            @case('encargado')
                @include('partials.header-encargado')
                @break
            @case('vendedor')
                @include('partials.header-vendedor')
                @break
            @case('contador')
                @include('partials.header-contador')
                @break 
       @endswitch
       @else
       <!-- Navbar para usuarios no autenticados -->
       @include('partials.navbar-guest')
   @endif
    </header>

    <main>
        <!-- Aquí se incluirá el contenido específico de cada página -->
        @yield('content')
    </main>

    <footer>
        <!-- Aquí puedes agregar el contenido del pie de página que se repetirá en todas las páginas -->
        @include('partials.footer')
    </footer>

    <!-- Aquí puedes incluir tus scripts JavaScript -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-GBXnZR8yhAtgqZ4eyAX6KOfi+O/1r0tjPR2yBPvUh22XQqknLpo2UPyU4UKO3zHm" crossorigin="anonymous"></script>
</body>
</html>
