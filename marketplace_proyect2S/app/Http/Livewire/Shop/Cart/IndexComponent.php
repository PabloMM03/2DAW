<?php

namespace App\Http\Livewire\Shop\Cart;

use Illuminate\Notifications\Notification;
use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        $cart_items = \Cart::session(auth()->id())->getContent();
        return view('livewire.shop.cart.index-component', compact('cart_items'))->extends('layouts.app')->section('content');
    }

    //Funcion para actuzalizar el precio del carrito segun los productos añadidos
    // public function update_quantity($itemId, $quantity){


    //     \Cart::session(auth()->id())->update($itemId, [
    //         'quantity' => array(
    //             'relative' => false,
    //             'value' => $quantity
    //         ),

    //     ]);
    // }

        public function delete_item($itemId){

            \Cart::session(auth()->id())->remove($itemId);

            
        }


}
