<?php

use App\Http\Controllers\CashController;
use App\Http\Controllers\PayPalController;
use App\Http\Livewire\Shop\Cart\IndexComponent as CartIndexComponent;

use App\Http\Livewire\Shop\CheckoutComponent;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Ruta de la tienda





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta del carrito


//Ruta Pagar


//Pagos Paypal
Route::get('/paypal/checkout{order}', [PayPalController::class, 'getExpressCheckout'])->name('paypal.checkout');
Route::get('/paypal-success/{order}', [PayPalController::class, 'getExpressCheckoutSuccess'])->name('paypal.success');
Route::get('/paypal-cancel', [PayPalController::class, 'cancelPage'])->name('paypal.cancel');