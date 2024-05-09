
<!DOCTYPE html>
<html lang="en">
<title>SAMAZON-DASHBOARD-SUPERVISOR</title>

<link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<body>

@include('encabezados.header-supervisor')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1>Este es el apartado del supervisor</h1>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Acciones CRUD para categorías</div>
                <div class="card-body text-center"> <!-- Agregado class="text-center" al card-body -->
                    <div class="row">
                        <div class="col-md-4 mb-3"> <!-- Cambiado a col-md-4 y agregado mb-3 -->
                            <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-lg btn-block">Crear</a> <!-- Agregado btn-lg y btn-block -->
                        </div>
                        <div class="col-md-4 mb-3"> <!-- Cambiado a col-md-4 y agregado mb-3 -->
                            <a href="{{ route('categorias.index') }}" class="btn btn-success btn-lg btn-block">Leer</a> <!-- Agregado btn-lg y btn-block -->
                        </div>
                        <div class="col-md-4"> <!-- Cambiado a col-md-4 -->
                            <a href="" class="btn btn-warning btn-lg btn-block">Actualizar</a> <!-- Agregado btn-lg y btn-block -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Últimas Transacciones</div>
                <div class="card-body">
                    <!-- Contenido de las últimas transacciones aquí -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Acciones de Usuarios</div>
                <div class="card-body">
                    <!-- Contenido de las acciones de usuarios aquí -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Vendedores</div>
                <div class="card-body">
                    <!-- Contenido de los vendedores aquí -->
                </div>
            </div>
        </div>
    </div>
</div>
 
</body>



</html>