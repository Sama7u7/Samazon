<?php


namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //
    public function mostrarCorreoUsuario(Request $request)
{
    $user_id = $request->session()->get('user_id');
    $usuario = Usuario::findOrFail($user_id);
    $correo = $usuario->email;

    // Pasar el correo del usuario a la vista
    return view('cliente.inicio-cliente')->with('correo', $correo);
}
}