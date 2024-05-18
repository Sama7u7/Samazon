@extends('layouts.master-usuarios')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuario</div>
                <div class="card-body">
                    <form action="{{ route('encargado.newppass', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email">Correo electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $usuario->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="role">Rol:</label>
                            <select name="role" id="role" class="form-control" readonly>
                                <option value="{{ $usuario->role }}">{{ ucfirst($usuario->role) }}</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $usuario->nombre }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="apellido_paterno">Apellido Paterno:</label>
                            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ $usuario->apellido_paterno }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="apellido_materno">Apellido Materno:</label>
                            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ $usuario->apellido_materno }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="genero">Género:</label>
                            <select name="genero" id="genero" class="form-control" readonly>
                                <option value="{{ $usuario->genero }}">{{ ucfirst($usuario->genero) }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Solo puedes modificar la contrasena">
                        </div>
                        <br>
                        
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection