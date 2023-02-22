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
        // 'cover_img',
        'category'

    ];


    //Relacion uno a muchos invert

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categoory(){
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
