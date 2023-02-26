<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Campos a evitar por asignacion masiva
     */
    protected $guarded = [
        
        'id', 'created_at', 'updated_at'
    ];


    //Relacion uno a muchos invert

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relacion Much to much

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Relacion polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imagen');

    }


}
