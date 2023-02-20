<?php

namespace App\Http\Controllers;

use App\Mail\OrderPagada;
use App\Models\Order;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    
    //Funcion para procesar el pago
    public function getExpressCheckout($orderId){
        
       $checkoutData = $this->checkoutData($orderId);

        $provider = new ExpressCheckout;

        $response= $provider->setExpressCheckout($checkoutData);

        return redirect($response['paypal_link']);


    }

public function getExpressCheckoutSuccess(Request $request, $orderId)
{
    // dd($request);
    $provider = new ExpressCheckout;

    $token = $request->token;
    $PayerID= $request->PayerID;
    $checkoutData = $this->checkoutData($orderId);

    $response = $provider->getExpressCheckoutDetails($token);

    //Validacion de proceso
    if(in_array(strtoupper($response['ACK']), ['SUCCESS' , 'SUCCESSWITHWARNING']))
    {
        $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $PayerID);
        $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

        //Validacion estado proceso
        if(in_array($status, ['Completed' , 'Processed'])){
            $order = Order::find($orderId);
            $order->is_paid = 1;
            $order->save(); //Se guarda la orden

            //Enviar correo al usuario
            //php artisan make:mail OrderPagada --markdown=mail.order.paid

            Mail::to($order->user()->email)->send(new OrderPagada($order));

            //En caso de que se efectue con exito
            return  redirect()->route('shop.index')->whithMessage('Pago realizado con exito');


        }
    }
    return  redirect()->route('shop.index')->withError('Pago no realizado debido a un error');

}

public function cancelPage()
{

dd('cancelado');

}

public function checkoutData($orderId)
{
    $cart = \Cart::session(auth()->id());

    $cartItems =  array_map(function($item){
        return [
            'name' => $item['name'],
            'price' => $item['price'],
            'qty' => $item['quantity'],
        ];
    },$cart->getContent()->toarray());

    $checkoutData = [
        'items' => $cartItems,
       'invoice_id' =>uniqid(),
        'invoice_description' =>"descripcion de orden",
        'return_url' => route('paypal.success', $orderId),
        'cancel_url' => route('paypal.cancel'),
        'total' => $cart->getTotal(),

    ];

    return $checkoutData;

}

}
