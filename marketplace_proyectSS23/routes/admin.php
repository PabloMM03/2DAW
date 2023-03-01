<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

//Rutas admin
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

//Ruta Users
Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.users');

//Ruta categorias
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

//Ruta tags
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

//Ruta admin creacion productos
Route::resource('products', ProductController::class)->except('show')->names('admin.products');

Route::resource('roles', RoleController::class)->names('admin.roles');