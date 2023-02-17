@extends('layouts.plantilla')

@section('title', 'Cursos edit')

@section ('content')
<h2>En esta página podrás editar un curso</h2>

<form action="{{route('cursos.update', $curso)}}" method="POST">
   
    @csrf
    @method('PUT');

    <label for="name">
        Nombre:
        <br>                               <!--mantiene valor    valor del campo   -->
        <input type="text" name="name" value="{{old('name', $curso->name)}}">
    </label>

    @error('name')
        <br>
        <small>*{{$message}}</small>
        <br> 
    @enderror

    <br>
    <label for="desc">
        Descripcion:
        <br>    
        <textarea name="descripcion" cols="30" rows="5">{{old('descripcion', $curso->descripcion)}}</textarea>
    </label>

    @error('descripcion')
        <br>
        <small>*{{$message}}</small>
        <br> 
    @enderror

    <br>
    <label for="categoria">
        Categoria:
        <br>
        <input type="text" name="categoria" value="{{old('categoria', $curso->categoria)}}">
    </label>

    @error('categoria')
        <br>
        <small>*{{$message}}</small>
        <br> 
    @enderror

    <br>
    <input type="submit" name="enviarDatos" id="enviarDatos" value="Actualizar Datos">
</form>
@endsection
