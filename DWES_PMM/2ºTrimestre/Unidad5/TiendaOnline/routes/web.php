<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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
Route::get('/', LoginController::class);

 Route::controller(ProductController::class)->group(function(){

     Route::get('productos','index')->name('producto.index'); // name es la ruta donde en los enlaces nos dirigira a la pagina especificada
     Route::get('productos/create', 'create')->name('productos.create');
     Route::post('productos', 'store')->name('productos.store');
     Route::get('productos/{producto}', 'show')->name('productos.show');
     Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');
     Route::put('cursos/{curso}', 'update')->name('cursos.update');
  });
