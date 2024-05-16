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

});

Route::middleware(['auth', 'role:contador'])->group(function () {
    
    Route::view('/contador', 'contador.inicio-contador')->name('contador');
});

Route::middleware(['auth', 'role:cliente'])->group(function () {
    
    Route::get('/cliente', [UsuarioController::class, 'combinar'])->name('cliente');
    Route::get('/cliente/categorias', [CategoriaController::class, 'index2'])->name('categorias.index2');
    Route::get('/productos/cliente/{categoria}', [ProductoController::class, 'productosPorCategoria'])->name('productosPorCategoria');
    Route::post('/preguntas', [PreguntaController::class, 'store'])->name('preguntas.store');
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