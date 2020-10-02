@extends('layouts.dashboard')

@section('title')
Roles
@endsection

@section('ventana')

@include('flash::message')

<div class="container">
    <h1>CREAR ROLES</h1><br>

    {!! Form::open(['route' => 'role.store', 'method' => 'POST']) !!}

    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('name','Nombre') !!} <br>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('slug','Slug') !!} <br>
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug', 'required'])
            !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('description','Descripción') !!} <br>
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'description', 'rows'
            => 3, 'cols' => 49, 'style' => 'resize:none', 'required'])
            !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('full_acces','Acceso completo') !!} <br>
            {!! Form::select('full_acces', ['' => 'Seleccione...', 'yes' => 'Si', 'no' =>
            'No'], null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>

    <label>Permisos</label><br>
    @foreach ($permissions as $permission)
    <div class="custom-control custom-checkbox">

        {!! Form::checkbox('permission[]' , $permission->id, null, ['id' => 'permission'.'_'.$permission->id]) !!}

        {!! Form::label('permissions'.'_'.$permission->id,
        $permission->id.'-'.$permission->name.'('.$permission->description.')') !!}

    </div>
    @endforeach

    <div class="row">
        <div class="form-group col-md-5"><br>
            {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>





@endsection