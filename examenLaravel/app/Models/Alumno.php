<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $guarded = [
        
        'id', 'created_at', 'updated_at'
    ];

    public function Modulo(){
        return $this->belongsToMany(Modulo::class);
    }
}
