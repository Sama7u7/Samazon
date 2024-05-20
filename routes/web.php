<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ContadorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth', 'role:supervisor'])->group(function () {
    
    Route::get('/supervisor', [UsuarioController::class, 'noconsignados'])->name('supervisor');
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/crear', [UsuarioController::class, 'crear'])->name('usuarios.crear'); // Vista para mostrar el formulario de creación de usuario
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store'); // Procesar el formulario de creación de usuario y almacenar en la base de datos
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/agregar', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
    Route::get('/categorias/delete', [CategoriaController::class, 'delete'])->name('categorias.delete');
    Route::get('categorias/{categoria}/edit', 'CategoriaController@edit')->name('categorias.edit');
    Route::put('categorias/{categoria}', 'CategoriaController@update')->name('categorias.update');
});

Route::middleware(['auth', 'role:encargado'])->group(function () {
    
    Route::view('/encargado', 'encargado.inicio-encargado')->name('encargado');
    Route::get('/encargado/categorias', [CategoriaController::class, 'indexencargado'])->name('encargado.indexencargado');
    Route::get('/productos/encargado/{categoria}', [ProductoController::class, 'productosPorCategoriaencargado'])->name('productosPorCategoriaencargado');
    Route::get('/productos/{id}/edit', [ProductoController::class, 'editestado'])->name('productos.form');
    Route::get('/productos/no_consignados', [ProductoController::class, 'productosEncargado'])->name('productos.list');
    Route::put('/productos/{id}', [ProductoController::class, 'updateeEstado'])->name('productos.edit');
    Route::get('/encargado/usuarios-rol', [UsuarioController::class, 'indexroles'])->name('encargado.index');
    Route::get('/encargado/usuarios/{usuario}/edit', [UsuarioController::class, 'resetPassword'])->name('encargado.edit');
    Route::put('/encargado/usuarios/{usuario}', [UsuarioController::class, 'newpass'])->name('encargado.newppass');
});


Route::middleware(['auth', 'role:vendedor'])->group(function () {
    
    Route::get('/vendedor', [ProductoController::class, 'productosVendedor'])->name('vendedor');
    Route::delete('vendedor/productos/{id}', [ProductoController::class, 'vendedordestroy'])->name('productos.destroy');
    Route::delete('/productos/{imagen}', [ProductoController::class, 'eliminarImagen'])->name('eliminar-imagen');
    // Ruta para mostrar las preguntas y permitir responder
    Route::get('/vendedor/preguntas', [VendedorController::class, 'preguntasVendedor'])->name('preguntas-vendedor');
    Route::post('vendedor/guardar-respuesta/{preguntaId}', [VendedorController::class,'guardarRespuesta'])->name('guardar-respuesta');
    Route::get('vendedor/productos/{id}/edit', [ProductoController::class, 'Vendedoredit'])->name('productos.edit');
    Route::put('vendedor/productos/{producto}', [ProductoController::class, 'Vendedorupdate'])->name('productos.update');
    Route::get('vendedor/producto/nuevo', [ProductoController::class, 'createProduct'])->name('vendedor.producto');
    Route::post('vendedor/producto/crear', [ProductoController::class, 'storeProduct'])->name('vendedor.store.product');
    Route::get('/vendedor/productos-vendidos', [VendedorController::class, 'verProductosVendidos'])->name('vendedor.productos-vendidos');

});

Route::middleware(['auth', 'role:contador'])->group(function () {
    
    Route::view('/contador', 'contador.inicio-contador')->name('contador');
    Route::get('/contador/productos-vendidos', [ContadorController::class, 'verProductosVendidos'])->name('contador.productos-vendidos');
    Route::post('/contador/realizar-pago', [ContadorController::class, 'realizarPago'])->name('contador.realizarPago');
    Route::get('/contador/historial-pagos', [ContadorController::class, 'historialPagos'])->name('historial-pagos');

    Route::get('/contador/ver-transacciones', [ContadorController::class, 'verTransacciones'])->name('contador.ver-transacciones');
    Route::post('/contador/validar-transaccion/{id}', [ContadorController::class, 'validarTransaccion'])->name('contador.validar-transaccion');
    Route::post('/contador/rechazar-transaccion/{id}', [ContadorController::class, 'rechazarTransaccion'])->name('contador.rechazar-transaccion');
    Route::post('/contador/en-envio-transaccion/{id}', [ContadorController::class, 'enenvioTransaccion'])->name('contador.en-envio-transaccion');
    Route::post('/contador/enviado-transaccion/{id}', [ContadorController::class, 'enviadoTransaccion'])->name('contador.enviado-transaccion');


});

Route::middleware(['auth', 'role:cliente'])->group(function () {
    
    Route::get('/cliente', [UsuarioController::class, 'combinar'])->name('cliente');
    Route::get('/cliente/categorias', [CategoriaController::class, 'index2'])->name('categorias.index2');
    Route::get('/productos/cliente/{categoria}', [ProductoController::class, 'productosPorCategoria'])->name('productosPorCategoria');
    Route::post('/productos/{productId}/preguntas', [PreguntaController::class, 'store'])->name('preguntas.store');
    Route::get('cliente/productos/{id}', [ProductoController::class, 'test'])->name('productos.test');

    Route::prefix('carrito')->middleware('auth')->group(function () {
        Route::post('agregar/{productoId}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
        Route::delete('eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
        Route::put('actualizar/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
        Route::get('/', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
        Route::post('checkout', [CarritoController::class, 'checkout'])->name('carrito.checkout');
    });
    Route::post('transaccion', [TransactionController::class, 'crearTransaccion'])->name('transaccion.crear');
    Route::get('transaccion/formulario', [TransactionController::class, 'verFormulario'])->name('transaccion.verFormulario');
    Route::get('transacciones', [TransactionController::class, 'verTransacciones'])->name('transacciones.ver');


    Route::middleware(['auth', 'role:cliente'])->group(function () {
        Route::get('/compras', [TransactionController::class, 'verCompras'])->name('compras');
        Route::get('/transaccion/{id}', [TransactionController::class, 'detallesTransaccion'])->name('transaccion.detalles');
        Route::post('/transacciones/{id}/calificar', [TransactionController::class, 'calificar'])->name('transacciones.calificar');
    });

});

//rutas para no usuarios
Route::get('/', [ProductoController::class, 'mostrarConsignadosguest'])->name('guest.principal');
Route::get('/categoriasuser', [CategoriaController::class, 'indexuser'])->name('categorias.indexuser');
Route::get('/productos/user/{categoria}', [ProductoController::class, 'productosPorCategoriaUser'])->name('productosPorCategoriaUser');


Route::get('/login', function () {return view('login');});
Route::post('/login', [AuthController::class, 'valida'])->name('login'); 

Route::get('/register', function () {return view('registro');});
Route::post('/register', [UsuarioController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('test/productos/{id}', [ProductoController::class, 'test'])->name('productos.test');





Route::resource('categorias', CategoriaController::class);



// Ruta por defecto en caso de que no se encuentre un rol específico para el usuario
Route::view('/default', 'default')->name('default');