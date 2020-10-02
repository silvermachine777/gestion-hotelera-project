@extends('layouts.dashboard')

@section('title')
Usuarios
@endsection

@section('ventana')

@include('flash::message')

<div class="container">
    <h1>CREAR USUARIO</h1><br>

    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('cedula','Número de documento') !!} <br>
            {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Número de documento',
            'required']) !!}
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('name','Nombre completo') !!} <br>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required'])
            !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('email','Correo electronico') !!} <br>
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electronico',
            'required'])
            !!}
        </div>        
        <div class="form-group col-md-5">
            {!! Form::label('roles','Rol del usuario') !!} <br>
            {!! Form::select('roles', $roles, null, ['class' => 'form-control', 'required']) !!}                         
        </div>  
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('password','Contraseña') !!} <br>
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'required']) !!}
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('estado_usuario', 'Estado del usuario') !!} <br>
            {!! Form::select('estado_usuario', ['' => 'Seleccione...', '1' => 'Activo', '0' => 'Inactivo'],null,
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





@endsection