<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respuesta;

class RespuestaController extends Controller
{
    //
    public function storeRespuesta(Request $request)
{
    // Validar los datos recibidos del formulario
    $request->validate([
        'content' => 'required|string|max:255',
        'pregunta_id' => 'required|exists:preguntas,id',
    ]);

    // Crear una nueva respuesta
    $respuesta = new Respuesta();
    $respuesta->content = $request->content;
    $respuesta->type = 'respuesta';
    $respuesta->pregunta_id = $request->pregunta_id;
    // Aquí también podrías asignar el ID del usuario autenticado si es necesario
    // $respuesta->user_id = auth()->id();
    $respuesta->save();

    return back()->with('success', 'La respuesta se ha enviado correctamente.');
}
}