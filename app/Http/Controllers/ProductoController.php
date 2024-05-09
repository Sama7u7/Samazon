<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Gate;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function productosPorCategoria($categoriaId)
    {
        $categoria = Categoria::findOrFail($categoriaId);
        $productos = Producto::where('categoria_id', $categoriaId)->get();
    
        return view('productos_por_categoria_cliente', compact('categoria', 'productos'));
    }
    public function productosPorCategoriaUser($categoriaId)
    {
        $categoria = Categoria::findOrFail($categoriaId);
        $productos = Producto::where('categoria_id', $categoriaId)->get();
    
        return view('productos_por_categoria_user', compact('categoria', 'productos'));
    }

    public function index()
    {
        $encontrados = Producto::all();
        return view('producto.index', compact('encontrados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('create', Producto::class )) {
//        $this->authorize('create', Producto::class );
$categorias = Categoria::all();
return view('producto.create',compact('categorias'));

        }else{
            echo "NO PUEDES";
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        $nuevo = new Producto();
        $nuevo->fill($request->all());
        $nuevo->save();
        return redirect(route('productos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('producto.show',compact('producto','categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('producto.edit',compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        //$producto->fill($request->all());


        $producto->save();
        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {

        $producto->delete();
        return redirect(route('productos.index'));
    }
}