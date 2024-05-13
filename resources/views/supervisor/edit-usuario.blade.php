@extends('layouts.master-supervisor')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuario</div>
                <div class="card-body">
                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email">Correo electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $usuario->email }}">
                        </div>
                        <div class="form-group">
                            <label for="role">Rol:</label>
                            <select name="role" id="role" class="form-control">
                                <option value="contador" {{ $usuario->role === 'contador' ? 'selected' : '' }}>Contador</option>
                                <option value="supervisor" {{ $usuario->role === 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                                <option value="vendedor" {{ $usuario->role === 'vendedor' ? 'selected' : '' }}>Vendedor</option>
                                <option value="cliente" {{ $usuario->role === 'cliente' ? 'selected' : '' }}>Cliente</option>
                                <option value="encargado" {{ $usuario->role === 'encargado' ? 'selected' : '' }}>Encargado</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $usuario->nombre }}">
                        </div>
                        <div class="form-group">
                            <label for="apellido_paterno">Apellido Paterno:</label>
                            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ $usuario->apellido_paterno }}">
                        </div>
                        <div class="form-group">
                            <label for="apellido_materno">Apellido Materno:</label>
                            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ $usuario->apellido_materno }}">
                        </div>
                        <div class="form-group">
                            <label for="genero">Género:</label>
                            <select name="genero" id="genero" class="form-control">
                                <option value="Masculino" {{ $usuario->genero === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ $usuario->genero === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Deja en blanco para mantener la contraseña actual">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection