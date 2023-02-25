<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProductController;

//Rutas admin
Route::get('', [HomeController::class, 'index'])->name('admin.home');

//Ruta categorias
Route::resource('categories', CategoryController::class)->names('admin.categories');

//Ruta tags
Route::resource('tags', TagController::class)->names('admin.tags');

//Ruta admin creacion productos
Route::resource('products', ProductController::class)->names('admin.products');

