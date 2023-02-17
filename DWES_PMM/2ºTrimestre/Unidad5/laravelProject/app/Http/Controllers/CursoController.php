<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    //Pagina Principal ->Proviene de la vista index.php
    public function index(){

        $cursos  = Curso::all(); // los obtiene todos los datos
        $cursos  = Curso::orderBy('id', 'desc')->paginate(); // Obtiene los datos poco a poco
        

        return view('cursos.index', compact('cursos'));
    }
    //Crear form ->Proviene de la vista create.php
    public function create(){
        return view('cursos.create');
    }

    public function store(Request $request){

        //Validar formulario
        $request->validate([
            'name' => 'required|max:10',
            'descripcion' => 'required|min:10',
            'categoria' => 'required'
        ]);

        //////////////////////////////

        $curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();
        return redirect()->route('cursos.show', $curso); // es lo mismo que poner $curso->id
    }

    //Mostrar Elemento ->Proviene de la vista show.php
    public function show(Curso $curso){
        // compact('curso');  ['curso' =>$curso];  Para poder pasarle una variable del html
        //Tambien se podria hacer con :return view('cursos.show', ['curso' =>$curso]); 
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso){
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request,Curso $curso){

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();
        return redirect()->route('cursos.show', $curso);
    }
}
