@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
<div class="card-header">
    @can('admin.categories.create')
    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.categories.create')}}">Añadir Categoria</a>
    @endcan
    <h1>Listado de categorias</h1>
</div>
    
@stop

@section('content')

{{--Alerta de confirmacion de eliminacion categoria--}}
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif
   
    <div class="card">
        
        <div class="card-body">
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            @can('admin.categories.edit')
                            <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category)}}">Editar</a></td>
                            @endcan
                            
                            <td width="10px">
                                @can('admin.categories.destroy')
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                                @endcan
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

