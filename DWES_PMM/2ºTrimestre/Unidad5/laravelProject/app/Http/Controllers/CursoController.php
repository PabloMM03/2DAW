<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    //Pagina Principal ->Proviene de la vista index.php
    public function index(){
        return view('cursos.index');
    }
    //Crear form ->Proviene de la vista create.php
    public function create(){
        return view('cursos.create');
    }
    //Mostrar Elemento ->Proviene de la vista show.php
    public function show($curso){
        // compact('curso');  ['curso' =>$curso];  Para poder pasarle una variable del html
        //Tambien se podria hacer con :return view('cursos.show', ['curso' =>$curso]); 
        return view('cursos.show', compact('curso'));
    }
}
