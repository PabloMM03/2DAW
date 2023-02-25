<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * Obtener ruta slug de categoria en vez de id 
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Ralaciones 
    public function products(){
        return $this->hasMany(Product::class);
    }
}
