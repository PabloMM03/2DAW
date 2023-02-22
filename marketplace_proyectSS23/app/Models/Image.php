<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Image extends Model
{

    use HasFactory;

    //Relacion polimorfica

    public function img_product(){
        return $this->morphTo();
    }

}