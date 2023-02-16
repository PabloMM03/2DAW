@extends('layouts.plantilla')

@section('title','Curso' . $curso->name)

@section ('content')

<!-- Es lo mismo pero mas limpio-->

{{-- <h2>Bienvenido al curso {{$curso}}</h2> --}}
{{-- <h2>Bienvenidoa al curso <?php echo $curso?></h2> --}}

<h2>Bienvenido al curso {{$curso->name}}</h2>

<p><strong>Categoria: {{$curso->categoria}}</strong></p>
<p>{{$curso->descripcion}}</p>
<a href="{{route('cursos.index')}}"><input type="submit" name="volver" id="volver" value="Volver a cursos"></a>
@endsection
