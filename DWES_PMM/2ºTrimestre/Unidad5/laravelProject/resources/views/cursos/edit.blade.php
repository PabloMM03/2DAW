@extends('layouts.plantilla')

@section('title', 'Cursos edit')

@section ('content')
<h2>En esta página podrás editar un curso</h2>

<form action="{{route('cursos.update', $curso)}}" method="POST">
   
    @csrf
    @method('PUT');

    <label for="name">
        Nombre:
        <br>
        <input type="text" name="name" value="{{$curso->name}}">
    </label>
    <br>

    <label for="desc">
        Descripcion:
        <br>
        <textarea name="descripcion" cols="30" rows="5">{{$curso->descripcion}}</textarea>
    </label>

    <br>
    <label for="categoria">
        Categoria:
        <br>
        <input type="text" name="categoria" value="{{$curso->categoria}}">
    </label>
    <br>
    <input type="submit" name="enviarDatos" id="enviarDatos" value="Actualizar Datos">
</form>
@endsection
