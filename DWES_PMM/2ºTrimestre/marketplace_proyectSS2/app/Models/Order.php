<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
        //Ralacion entre tablas de ordenes, productos
        //Se le especifica con withPivot a que campos se va a acceder
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('price', 'quantity');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}


