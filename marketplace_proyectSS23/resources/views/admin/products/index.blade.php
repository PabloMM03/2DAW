@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
<a class="btn btn-primary btn-sm float-right" href="{{route('admin.products.create')}}">Añadir Producto</a>      
    <h1>Listado de Productos</h1>
@stop

@section('content')
    @livewire('admin.products-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop