<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class);

// Route::get('cursos', [CursoController::class, 'index']);

// //cursos/create ejecuta esta
// Route::get('cursos/create', [CursoController::class, 'create']);

// //cursos/php (variable) ejecuta esta
//  Route::get('cursos/{curso}', [CursoController::class, 'show']);


//Crear grupo de rutas de un controlador , es decir todas las rutas provienen del mismo controlador
 Route::controller(CursoController::class)->group(function(){

    Route::get('cursos','index')->name('cursos.index'); // name es la ruta donde en los enlaces nos dirigira a la pagina especificada
    Route::get('cursos/create', 'create')->name('cursos.create');
    Route::post('cursos', 'store')->name('cursos.store');
    Route::get('cursos/{curso}', 'show')->name('cursos.show');
   //  Route::get('cursos/{curso}', 'show')->name('cursos.show');
    Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');
    Route::put('cursos/{curso}', 'update')->name('cursos.update');
    Route::delete('cursos/{curso}', 'destroy')->name('cursos.destroy');
 });

