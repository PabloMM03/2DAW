@extends('layouts.plantilla')

@section('title', 'Curso' . $curso)

@section ('content')

<!-- Es lo mismo pero mas limpio-->

<h2>Bienvenidoa al curso {{$curso}}</h2>
{{-- <h2>Bienvenidoa al curso <?php echo $curso?></h2> --}}
@endsection
