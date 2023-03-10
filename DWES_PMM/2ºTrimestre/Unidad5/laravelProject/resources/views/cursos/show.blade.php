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
<a href="{{route('cursos.edit', $curso)}}"><input type="submit" name="editar" id="editar" value="Editar Curso"></a>

<form action="{{route('cursos.destroy', $curso)}}" method="POST">
    @csrf
    @method('delete');
    <input type="submit" name="delete" id="delete" value="Eliminar Curso">

</form>


@endsection
