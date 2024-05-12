<!-- detalle-producto.blade.php -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Mostrar la imagen del producto -->
            <img src="{{ $producto->imagen }}" class="img-fluid" alt="{{ $producto->nombre }}">
        </div>
        <div class="col-md-6">
            <!-- Mostrar la información del producto -->
            <h5>{{ $producto->nombre }}</h5>
            <p>{{ $producto->descripcion }}</p>
            <!-- Agrega aquí cualquier otra información que desees mostrar -->
            <!-- Por ejemplo: -->
            <p>Precio: ${{ $producto->precio }}</p>
            <p>Disponibilidad: {{ $producto->cantidad }}</p>
        </div>
    </div>
</div>
