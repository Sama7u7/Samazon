<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostrarConsignadoscliente()
    {
        // Recuperar todos los productos con estado 'consignado'
        $productosConsignados = Producto::where('estado', 'consignado')->get();

        // Pasar los productos consignados a la vista para mostrarlos
        return view('cliente.inicio-cliente', ['productos' => $productosConsignados]);
    }

    public function mostrarConsignadosguest()
    {
        // Recuperar todos los productos con estado 'consignado'
        $productosConsignados = Producto::where('estado', 'consignado')->get();

        // Pasar los productos consignados a la vista para mostrarlos
        return view('guest.inicio-guest', ['productos' => $productosConsignados]);
    }
    public function productosPorCategoria($categoriaId)
    {
        $categoria = Categoria::findOrFail($categoriaId);
        $productos = Producto::where('categoria_id', $categoriaId)->get();
    
        return view('cliente.productos-por-categoria-cliente', compact('categoria', 'productos'));
    }


    public function productosPorCategoriaencargado($categoriaId)
    {
        $categoria = Categoria::findOrFail($categoriaId);
        $productos = Producto::where('categoria_id', $categoriaId)->get();
    
        return view('encargado.producto-por-categoria-encargado', compact('categoria', 'productos'));
    }




    public function productosPorCategoriaUser($categoriaId)
    {
        $categoria = Categoria::findOrFail($categoriaId);
        $productos = Producto::where('categoria_id', $categoriaId)->get();
    
        return view('guest.productos-por-categoria-guest', compact('categoria', 'productos'));
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

    public function productosEncargado()
    {
        $productos = Producto::all();
        return view('encargado.producto-no-consignados', compact('productos'));
    }


    public function editestado($id)
{
    $producto = Producto::findOrFail($id);
    return view('encargado.editar-estado-producto', compact('producto'));
}

    public function updateeEstado(Request $request, $id)
{
    $producto = Producto::findOrFail($id);

    // Actualizar el estado y motivo del producto
    $producto->estado = $request->input('estado');
    $producto->motivo = $request->input('motivo');

    // Guardar los cambios en la base de datos
    $producto->save();

    return redirect()->route('productos.list')->with('success', 'Producto actualizado correctamente');
}

public function test($id)
{
    $producto = Producto::findOrFail($id);
    return view('vista-pruebas', compact('producto'));
}



}