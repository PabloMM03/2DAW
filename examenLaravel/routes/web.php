<?php

use App\Http\Controllers\ModuloController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/modulos/{id}/alumnos',[ModuloController::class , 'show'])->name('listado.show');
Route::post('/modulos/{id}/alumnos',[ModuloController::class , 'create'])->name('listado.create');