@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Listado de Etiquetas</h1>
@stop

@section('content')

{{--Alerta de confirmacion de eliminacion categoria--}}
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif
   
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm float-right" href="{{route('admin.tags.create')}}">Añadir Etiqueta</a>
        </div>
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
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag)}}">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{-- </div>

    {{$tags->links()}} 

</div> --}}

@stop

