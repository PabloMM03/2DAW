@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif

<div class="crad">
    <div class="card-body">
        {{--No autocompletar al excribir--}}
        {!! Form::model($product,['route' => ['admin.products.update', $product], 'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

{{--Id del usuario el cual añade el producto--}}



{{--formulario de creacionde productos--}}

        @include('admin.products.partials.form')

        {!! Form::submit('Actualizar producto', ['class' => 'btn btn-primary btn-sm']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop