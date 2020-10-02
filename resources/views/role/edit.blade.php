@extends('layouts.dashboard')

@section('title')
Roles
@endsection

@section('ventana')

@include('flash::message')

<div class="container">
    <h1>EDITAR ROL</h1><br>

    {!! Form::open(['route' => ['role.update', $role->id], 'method' => 'PUT']) !!}

    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('name','Nombre') !!} <br>
            {!! Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('slug','Slug') !!} <br>
            {!! Form::text('slug', $role->slug, ['class' => 'form-control', 'placeholder' => 'Slug', 'required'])
            !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('description','Descripción') !!} <br>
            {!! Form::textarea('description', $role->description, ['class' => 'form-control', 'placeholder' => 'description', 'rows'
            => 3, 'cols' => 49, 'style' => 'resize:none', 'required'])
            !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('full_acces','Acceso completo') !!} <br>
            {!! Form::select('full_acces', ['' => 'Seleccione...', 'yes' => 'Si', 'no' =>
            'No'], $role->full_acces, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>

    <label>Permisos</label><br>
    @foreach ($permissions as $permission)
    <div class="custom-control custom-checkbox">
        <input type="checkbox" 
        class="custom-control-input" 
        id="permission_{{$permission->id}}"
        value="{{$permission->id}}"
        name="permission[]"

        @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
        checked

        @elseif( is_array($permissionRole) && in_array("$permission->id", $permissionRole)    )
        checked

        @endif
        >
        <label class="custom-control-label" 
            for="permission_{{$permission->id}}">
            {{ $permission->id }}
            - 
            {{ $permission->name }} 
            <em>( {{ $permission->description }} )</em>
        
        </label>
      </div>
    {{--  <div class="custom-control custom-checkbox">

        {!! Form::checkbox('permission[]' , $permission->id, 
        @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
        { !! checked !!}

        @elseif( is_array($permissionRole) && in_array("$permission->id", $permissionRole)    )
        { !! checked !!}

        @endif, ['id' => 'permission'.'_'.$permission->id]) !!}        

        {!! Form::label('permissions'.'_'.$permission->id,
        $permission->id.'-'.$permission->name.'('.$permission->description.')') !!}

    </div>  --}}
    @endforeach

    <div class="row">
        <div class="form-group col-md-5"><br>
            {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>





@endsection