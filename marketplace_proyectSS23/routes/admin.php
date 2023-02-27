<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

//Rutas admin
Route::get('', [HomeController::class, 'index'])->name('admin.home');

//Ruta Users
Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.users');

//Ruta categorias
Route::resource('categories', CategoryController::class)->names('admin.categories');

//Ruta tags
Route::resource('tags', TagController::class)->names('admin.tags');

//Ruta admin creacion productos
Route::resource('products', ProductController::class)->names('admin.products');

