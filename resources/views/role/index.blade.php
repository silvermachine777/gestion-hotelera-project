@extends('layouts.dashboard')


@section('title')
Roles
@stop


@section('ventana')
@include('flash::message')

<div class="container">
    <h1>ROLES</h1><br>
    <a href="{{ route('role.create')}}" class="btn btn-success">Crear</a><br><br>
    <table class="table table-hover" id="users-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Slug</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acceso completo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td scope="col-sm">{{$role->id}}</td>
                <td scope="col-sm">{{$role->name}}</td>
                <td scope="col-sm">{{$role->slug}}</td>
                <td scope="col-sm">{{$role->description}}</td>
                @if ($role->full_acces == 'yes')
                <td scope="col-sm">Si</td>
                @else
                <td scope="col-sm">No</td>
                @endif
                <td scope="col-sm">
                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning"><i class="fa fa-pencil"
                            aria-hidden="true"></i>
                        Editar</a>
                    {!! Form::open(['route' => ['role.destroy', $role->id], 'method' => 'DELETE']) !!}

                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Desea eliminar el rol seleccionado?')">Eliminar</button>

                    {!! Form::close() !!}
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    {!! $roles->render() !!}
</div>

@stop