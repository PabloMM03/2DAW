<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurso;

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

    public function store(StoreCurso $request){

        //Almacenar infromacion en bbdd

        // $curso = new Curso(); //creamos una instacia del modelo curso

        // $curso->name = $request->name;                      //{obtemos lo que se manda del formulario por POST}
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();


        //ES LO MISMO QUE ARRIBA PERO MAS OPTIMO
        $curso = Curso::create($request->all());
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

        //validacion por defecto
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);

        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        //HACE LO MISMO QUE ARRIBA
        $curso->update($request->all());
        return redirect()->route('cursos.show', $curso);
    }
}
