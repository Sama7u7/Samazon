<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;

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
//rutas para no usuarios
Route::get('/', [ProductoController::class, 'mostrarConsignadosguest'])->name('guest');
Route::get('/categoriasuser', [CategoriaController::class, 'indexuser'])->name('categorias.indexuser');
Route::get('/productos/user/{categoria}', [ProductoController::class, 'productosPorCategoriaUser'])->name('productosPorCategoriaUser');


Route::get('/login', function () {return view('login');});
Route::post('/login', [LoginController::class, 'valida'])->name('login'); 

Route::get('/register', function () {return view('registro');});
Route::post('/register', [UsuarioController::class, 'register'])->name('register');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para las vistas de cliente
//Route::get('/cliente', [ProductoController::class, 'mostrarConsignadoscliente'])->name('');
Route::get('/cliente', [UsuarioController::class, 'combinar'])->name('cliente');
Route::get('/cliente/categorias', [CategoriaController::class, 'index2'])->name('categorias.index2');
Route::get('/productos/cliente/{categoria}', [ProductoController::class, 'productosPorCategoria'])->name('productosPorCategoria');

//Rutas para la vista supervisor
Route::view('/supervisor', 'supervisor.inicio-supervisor')->name('supervisor');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/crear', [UsuarioController::class, 'crear'])->name('usuarios.crear'); // Vista para mostrar el formulario de creación de usuario
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store'); // Procesar el formulario de creación de usuario y almacenar en la base de datos
Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/usuarios/{id}/show_reset_password_form', [UsuarioController::class, 'formularioContra'])->name('usuarios.show_reset_password_form');
Route::post('/usuarios/{id}/reset_password', [UsuarioController::class, 'resetPassword'])->name('usuarios.reset_password');

//Rutas rol  vendedor
Route::view('/vendedor', 'inicio-vendedor')->name('vendedor');
//Rutas rol contador
Route::view('/contador', 'inicio-contador')->name('contador');
//rutas rol encargado
Route::view('/encargado', 'encargado.inicio-encargado')->name('encargado');
Route::get('/encargado/categorias', [CategoriaController::class, 'indexencargado'])->name('encargado.indexencargado');
Route::get('/productos/encargado/{categoria}', [ProductoController::class, 'productosPorCategoriaencargado'])->name('productosPorCategoriaencargado');
Route::get('/productos/{id}/edit', [ProductoController::class, 'editestado'])->name('productos.form');
Route::get('/productos/no_consignados', [ProductoController::class, 'productosEncargado'])->name('productos.list');
Route::put('/productos/{id}', [ProductoController::class, 'updateeEstado'])->name('productos.edit');



// CRUD CATEGORIAS
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/agregar', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::get('/categorias/delete', [CategoriaController::class, 'delete'])->name('categorias.delete');
Route::get('categorias/{categoria}/edit', 'CategoriaController@edit')->name('categorias.edit');
Route::put('categorias/{categoria}', 'CategoriaController@update')->name('categorias.update');

Route::resource('categorias', CategoriaController::class);




//
Route::get('/inicio', function () {
    return view('welcome');
});
// Ruta por defecto en caso de que no se encuentre un rol específico para el usuario
Route::view('/default', 'default')->name('default');