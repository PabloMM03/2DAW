@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
   
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' => 'Introduza el nombre del rol']) !!}
            
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            
            <h2 class="h3">
                Listado de Permisos
            </h2>
            
            <div class="form-check">
                @foreach ($permisos as $permiso)
                    <input class="form-check-input" type="checkbox" value="{{$permiso->id}}">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $permiso->description }} 
                    </label>
                    <br>
                @endforeach
            </div>

                {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>


@stop

