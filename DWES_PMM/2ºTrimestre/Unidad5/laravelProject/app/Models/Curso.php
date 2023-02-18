<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    //protected $table = "users"; // Ignorara a cursos y se encargará de users

    // protected $fillable = ['name', 'descripcion', 'categoria']; //Campos permitidos
    protected $guarded = ['status']; //Campos protegidos

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

}
