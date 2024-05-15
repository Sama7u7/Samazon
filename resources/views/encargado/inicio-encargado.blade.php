@extends('layouts.master-usuarios')

@section('title', 'SAMAZON - TODO LO QUE BUSCAS')

@section('content')

   <div class="container mt-4">
    <br>
    <h1>Bienvenido, {{ session('nombre') }}</h1>
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">Listado de Productos No Consignados</div>
                  <div class="card-body text-center">
                      <p>Presiona el botón para ver el listado de productos no consignados:</p>
                      <a href="{{ route('productos.list') }}" class="btn btn-primary">Ver Productos No Consignados</a>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Espacio adicional -->
  <div style="height: 500px;"></div>
   

       

@endsection