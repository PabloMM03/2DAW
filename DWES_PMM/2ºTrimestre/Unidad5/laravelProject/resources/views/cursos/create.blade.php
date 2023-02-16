@extends('layouts.plantilla')

@section('title', 'Cursos create')

@section ('content')
<h2>En esta página podrás crear un curso</h2>

<form action="{{route('cursos.store')}}" method="POST">
   
    @csrf

    <label for="name">
        Nombre:
        <br>
        <input type="text" name="name">
    </label>
    <br>

    <label for="desc">
        Descripcion:
        <br>
        <textarea name="descripcion" cols="30" rows="5"></textarea>
    </label>

    <br>
    <label for="categoria">
        Categoria:
        <br>
        <input type="text" name="categoria">
    </label>
    <br>
    <input type="submit" name="enviarDatos" id="enviarDatos" value="Enviar Datos">
</form>
@endsection
