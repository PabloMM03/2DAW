@extends('layouts.plantilla')

@section('title', 'Cursos')

@section ('content')

<h2>Bienvenido a la pagina cursos</h2>
<a href="{{route('cursos.create')}}"><input type="submit" name="volver" id="volver" value="Crear Curso"></a>
{{-- <a href="{{route('cursos.create')}}">Crear Curso</a> --}}
<ul>
        @foreach ($cursos as $curso)
            <li>
                {{-- {{$curso->name}} Mostrar nombres de cursos--}} 
               <a href="{{route('cursos.show', $curso->id)}}">{{$curso->name}}</a>  {{--Acceder al curso correspodiente por su id --}}
                
            </li>
        @endforeach
</ul>

{{$cursos->links()}}
@endsection

