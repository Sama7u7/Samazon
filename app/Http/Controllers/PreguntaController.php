<?php

namespace App\Http\Controllers;
use App\Models\Pregunta;
use Illuminate\Http\Request;


class PreguntaController extends Controller
{
    //
    
    public function store(Request $request)
{
    // Validar los datos recibidos del formulario
    $request->validate([
        'pregunta' => 'required|string|max:255',
        'product_id' => 'required|exists:productos,id',
    ]);

    // Crear una nueva pregunta
    $pregunta = new Pregunta();
    $pregunta->pregunta = $request->pregunta;
    $pregunta->respuesta = null;
    $pregunta->product_id = $request->product_id;
    // Aquí deberías asignar también el ID del usuario autenticado si es necesario
    $pregunta->user_id = auth()->id();
    $pregunta->save();

    return back()->with('success', 'La pregunta se ha enviado correctamente.');
}

public function guardarRespuesta(Request $request, Pregunta $pregunta)
{
    $request->validate([
        'respuesta' => 'required|string|max:255',
    ]);

    $pregunta->respuesta = $request->respuesta;
    $pregunta->save();

    return back()->with('success', 'Respuesta guardada correctamente.');
}

}