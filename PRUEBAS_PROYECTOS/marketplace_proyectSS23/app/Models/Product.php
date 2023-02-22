<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'cover_img',
        'category'

    ];

    //Relacion polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'img_product');
    }

}
