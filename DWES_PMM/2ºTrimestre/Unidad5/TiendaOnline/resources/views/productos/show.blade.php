@extends('layouts.plantilla')

@section('title','Producto' . $producto->name)

@section ('content')

<!-- Es lo mismo pero mas limpio-->

{{-- <h2>Bienvenido al curso {{$curso}}</h2> --}}
{{-- <h2>Bienvenidoa al curso <?php echo $producto?></h2> --}}

<h2>Este es el producto:{{$producto->name}}</h2>

<p><strong>Categoria: {{$curso->categoria}}</strong></p>
<p>{{$curso->descripcion}}</p>
<a href="{{route('cursos.index')}}"><input type="submit" name="volver" id="volver" value="Volver a cursos"></a>
<a href="{{route('cursos.edit', $curso)}}"><input type="submit" name="editar" id="editar" value="Editar Curso"></a>
@endsection


