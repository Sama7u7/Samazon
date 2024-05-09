<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
class CategoriaController extends Controller
{
    
    public function productosPorCategoria($categoriaId)
{
    $categoria = Categoria::findOrFail($categoriaId);
    $productos = Producto::where('categoria_id', $categoriaId)->get();

    return view('productos_por_categoria', compact('categoria', 'productos'));
}
public function productosPorCategoriauser($categoriaId)
{
    $categoria = Categoria::findOrFail($categoriaId);
    $productos = Producto::where('categoria_id', $categoriaId)->get();

    return view('productos_por_categoria', compact('categoria', 'productos'));
}

    public function index()
    {
        $categorias = Categoria::all();
    
        return view('categorias', compact('categorias'));
    }

    public function index2()
    {
        $categorias = Categoria::all();
    
        return view('categoriacliente', compact('categorias'));
    }

    public function indexuser()
    {
        $categorias = Categoria::all();
    
        return view('categoriauser', compact('categorias'));
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

}