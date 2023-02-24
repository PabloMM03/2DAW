<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;

//Rutas admin
Route::get('', [HomeController::class, 'index'])->name('admin.home');

//Ruta categorias
Route::resource('categories', CategoryController::class)->names('admin.categories');

//Ruta admin creacion productos
Route::resource('posts', PostController::class)->names('admin.posts');

