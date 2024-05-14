<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
class CategoriaController extends Controller
{
    

    public function index()
    {
        $categorias = Categoria::all();
    
        return view('categoria.categorias', compact('categorias'));
    }

    public function index2(Request $request)
    {
        $categorias = Categoria::all();
        $token = $request->session()->get('api_token'); // Obtener el token
        $usuario = Usuario::where('token', $token)->first(); // Obtener el usuario
        return view('cliente.categoria-cliente', ['usuario' => $usuario, 'categorias' => $categorias]);
    
        
    }
    public function indexencargado(Request $request)
    {
        $categorias = Categoria::all();
        $token = $request->session()->get('api_token'); // Obtener el token
        $usuario = Usuario::where('token', $token)->first(); // Obtener el usuario
        return view('encargado.categoria-encargado', ['usuario' => $usuario, 'categorias' => $categorias]);
    
        
    }

    public function indexuser(Request $request)
    {
        $categorias = Categoria::all();
       

    
        return view('guest.categoria-guest', compact('categorias'));
    }

public function create()
{
    return view('categoria.crear');
}

    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255|unique:categorias,nombre', 
    ]);

    // Crear la nueva categoría
    Categoria::create([
        'nombre' => $request->nombre,
    ]);

    // Redireccionar de vuelta a la página de categorías con un mensaje de éxito
    return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
}

public function delete()
{
    return view('categoria.eliminar');
}

public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente');
    }

    public function edit(Categoria $categoria)
{
    return view('categoria.edit', compact('categoria'));
}
public function update(Request $request, Categoria $categoria)
{
    // Valida los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255', // Reglas de validación para el nombre
    ]);

    // Actualiza los datos de la categoría con los datos del formulario
    $categoria->nombre = $request->nombre;
    $categoria->save();

    // Redirige de vuelta a la lista de categorías con un mensaje de éxito
    return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
}

}