@extends('layouts.plantilla')

@section('title', 'Productos create')

@section ('content')
<h2>En esta pagina podrás publicar un producto</h2>

<form action="{{route('productos.store')}}" method="POST">
   
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


