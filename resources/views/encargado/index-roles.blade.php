@extends('layouts.master-encargado')

@section('content')
    <div class="container">
        <h1>Listado de Usuarios</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->role }}</td>
                        <td>
                            <a href="{{ route('encargado.edit', $usuario->id) }}" class="btn btn-primary">Editar</a>
                           
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
