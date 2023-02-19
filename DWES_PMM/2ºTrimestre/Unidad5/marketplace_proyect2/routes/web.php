<?php

use App\Http\Livewire\Shop\Cart\IndexComponent as CartIndexComponent;
use App\Http\Livewire\Shop\CartComponent;
use App\Http\Livewire\Shop\CheckoutComponent;
use App\Http\Livewire\Shop\IndexComponent;
use App\PaypalCheckout;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Ruta de la tienda
Route::get('/', IndexComponent::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta del carrito
Route::get('/cart', CartIndexComponent::class)->name('cart');

//Ruta Pagar
Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/paypal-success/{order}', [PaypalCheckout::class, 'getExpressCheckoutSuccess'])->name('paypal.success');
Route::get('/paypal-cancel', [PaypalCheckout::class, 'cancelPage'])->name('paypal.cancel');