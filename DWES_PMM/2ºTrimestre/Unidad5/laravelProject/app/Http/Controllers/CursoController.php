<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    //Pagina Principal ->Proviene de la vista index.php
    public function index(){

        $cursos  = Curso::all(); // los obtiene todos los datos
        $cursos  = Curso::paginate(); // Obtiene los datos poco a poco
        

        return view('cursos.index', compact('cursos'));
    }
    //Crear form ->Proviene de la vista create.php
    public function create(){
        return view('cursos.create');
    }
    //Mostrar Elemento ->Proviene de la vista show.php
    public function show($id){
        // compact('curso');  ['curso' =>$curso];  Para poder pasarle una variable del html
        //Tambien se podria hacer con :return view('cursos.show', ['curso' =>$curso]); 
        $curso = Curso::find($id);
        return view('cursos.show', compact('curso'));
    }
}
