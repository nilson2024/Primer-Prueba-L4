<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

/*Route::resource('productos', ProductoController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);*/

// Otras rutas...


//Route::get('/', {LaravelController::class,"index"})->name('laravel.idex');

/*Route::prefix('/hola')->group(function () {

    // Prefijo /hola
    Route::get('/', function () {
        // ruta: /hola/
        return "Ruta solo Hola";
    });

    Route::get('/{nombre}', function ($nombre) {
        // ruta: /hola/{nombre}
        return view('saludo')->with('nombre', $nombre);
    })->name('saludo');
});*/

/*
Ejercicio Rutas
*/

/*Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('grupo1', function () {
    return "Algo";
})->name('gl.index');*/

// Ruta página principal
Route::get('/', function () {
    return view('index');
})->name('index');

// Ruta página 2
Route::get('/grupo1', function () {
    return view('g1index');
})->name('g1index');

// Ruta página 3
Route::get('/grupo1/pagina3', function () {
    return view('g1p3');
})->name('g1p3');

// Ruta página 4
Route::get('/grupo1/pagina4', function () {
    return view('g1p4');
})->name('g1p4');


Route::prefix('/productos')->group(function () {

    // mostrar una lista de productos
    Route::get('/', [ProductoController::class, 'index'])->name('productos.index');

    // Mostrar solo un producto
    Route::get('/{id}', [ProductoController::class, 'show'])->name('producto.mostrar')->where('id', '[0-9]+');

    // mostrar una unico producto
    //Route::get('/mostrar/{id}', [ProductoController::class, 'show'])->name('producto.mostrar')->where('id', '[0-9]+');

    //Mostrar un formulario en blaco para crear un nuevo producto
    Route::get('/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/crear', [ProductoController::class, 'store'])->name('productos.store');  

    // Editar un Producto existente
    Route::get('/{id}/editar', [ProductoController::class, 'edit'])->name('productos.edit')->whereNumber('id');
    Route::put('/{id}/editar', [ProductoController::class, 'update'])->name('productos.update')->whereNumber('id');

    Route::delete('productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

});

Route::get('nombres/{nombre}', function ($nombre) {
    return "Hola $nombre Bienvenido!";
    
});