@extends('layouts.master-supervisor')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Crear Usuario</div>
            <div class="card-body">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <select name="genero" id="genero" class="form-control">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select name="rol" id="rol" class="form-control">
                            <option value="contador">Contador</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="vendedor">Vendedor</option>
                            <option value="cliente">Cliente</option>
                            <option value="encargado">Encargado</option>
                        </select>
                    </div>
                    <br>
                
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                </form>
                
            </div>
        </div>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

