<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    // Función para mostrar las preguntas de un producto y permitir responder
    public function preguntasVendedor()
    {
        $vendedorId = auth()->id();

    // Obtener todos los productos del vendedor
        $productos = Producto::where('propietario_id', $vendedorId)->get();

        // Obtener las preguntas asociadas a los productos del vendedor autenticado
        $preguntas = auth()->user()->productos()->with('preguntas')->get()->pluck('preguntas')->flatten();
       
 
        return view('vendedor.responder-preguntas', compact('productos', 'preguntas'));
    }

    public function guardarRespuesta(Request $request, $preguntaId)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'respuesta' => 'required|string|max:255',
        ]);

        // Crear una nueva respuesta
        $respuesta = new Pregunta();
        $respuesta->content = $request->respuesta;
        $respuesta->pregunta_id = $preguntaId; // El ID de la pregunta se recibe como parámetro
        // Aquí también podrías asignar el ID del usuario autenticado si es necesario
        $respuesta->user_id = auth()->id();
        $respuesta->save();

        return back()->with('success', 'La respuesta se ha enviado correctamente.');
    }

}
