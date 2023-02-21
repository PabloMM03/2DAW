<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Controlador encargado de vistas admin
class HomeController extends Controller
{
    public function index(){

        return view('admin.index');
    }
}
