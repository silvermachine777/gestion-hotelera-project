
@extends('layouts.dashboard')


@section('title')
    Usuarios
@stop


@section('ventana')
@include('flash::message')
    
<div class="container">
    <h1>USUARIOS</h1><br>
    <a href="{{ route('users.create')}}" class="btn btn-success">Crear</a><br><br>
    <table class="table table-hover" id="users-table">
        <thead>
            <tr>
                <th scope="col">Cédula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td scope="col-sm">{{$user->cedula}}</td>
                <td scope="col-sm">{{$user->name}}</td>
                <td scope="col-sm">{{$user->email}}</td> 
                <td scope="col-sm">
                @isset( $user->roles[0]->name )
                    {{ $user->roles[0]->name}}
                @endisset                
                </td>
                @if ($user->estado_usuario == 1)
                <td scope="col-sm">Activo</td>    
                @else
                <td scope="col-sm">Inactivo</td>    
                @endif                    
                <td scope="col-sm">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>
                        Editar</a>
                    <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('Desea eliminar el usuario seleccionado?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                        Eliminar</a>
                </td>
                
            </tr>
            @endforeach

        </tbody>
    </table>
    {!! $users->render() !!}
</div>

@stop

