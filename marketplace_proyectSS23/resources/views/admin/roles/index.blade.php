@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')

    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.roles.create')}}">Añadir Rol</a>
    <h1>Listado de Roles</h1>
  
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td width="10">
                                    <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary btn-sm">Editar</a>
                                </td>
                                <td width="10">
                                    <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
@stop

