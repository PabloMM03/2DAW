@extends('layouts.plantilla')

@section('title', 'Productos')

@section ('content')

<h2>Bienvenido a la pagina Productos</h2>
<a href="{{route('productos.create')}}"><input type="submit" name="volver" id="volver" value="Crear Curso"></a>
{{-- <a href="{{route('cursos.create')}}">Crear Curso</a> --}}
<ul>
        @foreach ($productos as $producto)
            <li>
                {{-- {{$curso->name}} Mostrar nombres de cursos--}} 
               <a href="{{route('productos.show', $producto->id)}}">{{$producto->name}}</a>  {{--Acceder al curso correspodiente por su id --}}
                
            </li>
        @endforeach
</ul>

{{$productos->links()}}
@endsection

