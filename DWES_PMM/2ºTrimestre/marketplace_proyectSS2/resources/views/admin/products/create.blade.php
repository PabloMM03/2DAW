@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif
<div class="card">
    <div class="card-body">
        {{--No autocompletar al excribir--}}
        {!! Form::open(['route' => 'admin.products.store', 'autocomplete' => 'off', 'files' => true]) !!}

{{--Id del usuario el cual añade el producto--}}


{{--formulario de creacionde productos--}}

        @include('admin.products.partials.form')

        {!! Form::submit('Crear producto', ['class' => 'btn btn-primary btn-sm ']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop




