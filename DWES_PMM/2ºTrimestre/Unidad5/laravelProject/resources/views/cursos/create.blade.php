@extends('layouts.plantilla')

@section('title', 'Cursos create')

@section ('content')
<h2>En esta página podrás crear un curso</h2>

<form action="{{route('cursos.store')}}" method="POST">
   
    @csrf

    <label for="name">
        Nombre:
        <br>
        <input type="text" name="name" value="{{old('name')}}">
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
        <textarea name="descripcion" cols="30" rows="5" value="{{old('descripcion')}}"></textarea>
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
        <input type="text" name="categoria" value="{{old('categoria')}}">
    </label>

    @error('categoria')
        <br>
        <small>*{{$message}}</small>
        <br>
    @enderror

    <br>
    <input type="submit" name="enviarDatos" id="enviarDatos" value="Enviar Datos">
</form>
@endsection
