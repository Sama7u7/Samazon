<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

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

Route::get('/', function () {
    return view('inicio');
});
Route::get('/categoriasuser', [CategoriaController::class, 'indexuser'])->name('categorias.indexuser');
Route::get('/productos/user/{categoria}', [ProductoController::class, 'productosPorCategoriaUser'])->name('productosPorCategoriaUser');

Route::get('/inicio', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'valida'])->name('login'); 

// Rutas para las vistas de los distintos roles
Route::view('/cliente', 'inicio-cliente')->name('cliente');
Route::get('/categorias/cliente', [CategoriaController::class, 'index2'])->name('categorias.index2');
Route::get('/productos/{categoria}', [ProductoController::class, 'productosPorCategoria'])->name('productosPorCategoria');

Route::view('/contador', 'inicio-contador')->name('contador');
Route::view('/encargado', 'inicio-encargado')->name('encargado');
Route::view('/supervisor', 'inicio-supervisor')->name('supervisor');
Route::view('/vendedor', 'inicio-vendedor')->name('vendedor');

// CRUD CATEGORIAS
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/agregar', [CategoriaController::class, 'create'])->name('categorias.create');

Route::post('/categorias', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::get('/categorias/delete', [CategoriaController::class, 'delete'])->name('categorias.delete');

Route::resource('categorias', CategoriaController::class);

// Ruta por defecto en caso de que no se encuentre un rol específico para el usuario
Route::view('/default', 'default')->name('default');