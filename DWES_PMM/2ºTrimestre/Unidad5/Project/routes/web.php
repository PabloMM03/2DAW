<?php

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

Route::get('cursos', function () {
    return "Bienvenido a la pagina cursos";
});

//cursos/create ejecuta esta
Route::get('cursos/create', function () {
    return "En esta página podrás crear un curso";
});

//cursos/php (variable) ejecuta esta
// Route::get('cursos/{curso}', function ($curso) {
//     return "Bienvenidoa al curso: $curso";
// });

Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {

    if($categoria){
        return "Bienvenidoa al curso: $curso, de la categoria $categoria";
    }else{
        return "Bienvenidoa al curso: $curso";
    }
});
