@extends('layouts.dashboard')


@section('title')
Editar usuarios
@stop


@section('ventana')
@include('flash::message')

<div class="container">
    <h1>MODIFICAR USUARIO</h1><br>

    {!! Form::open(['route' => ['users.update', $users], 'method' => 'PUT']) !!}


    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('cedula','Número de documento') !!} <br>
            {!! Form::text('cedula', $users->cedula, ['class' => 'form-control', 'placeholder' => 'Número de documento',
            'required']) !!}
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('name','Nombre completo') !!} <br>
            {!! Form::text('name', $users->name, ['class' => 'form-control', 'placeholder' => 'Nombre completo',
            'required'])
            !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('email','Correo electronico') !!} <br>
            {!! Form::email('email', $users->email, ['class' => 'form-control', 'placeholder' => 'Correo electronico',
            'required'])
            !!}
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('roles','Rol del usuario') !!} <br>
            {!! Form::select('roles', $roles, $users->roles, ['class' => 'form-control', 'required']) !!}                         
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('password','Contraseña') !!} <br>
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'required']) !!}
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('estado_usuario', 'Estado del usuario') !!} <br>
            {!! Form::select('estado_usuario', ['' => 'Seleccione...', '1' => 'Activo', '0' =>
            'Inactivo'],$users->estado_usuario,
            ['class' =>
            'form-control', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5"><br>
            {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>
@stop