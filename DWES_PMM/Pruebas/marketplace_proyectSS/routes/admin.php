<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

//Rutas admin

Route::get('', [HomeController::class, 'index'])->name('admin.home');