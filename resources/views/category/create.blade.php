@extends('layouts.dashboard')

@section('title')
Categorias
@endsection

@section('ventana')

@include('flash::message')

<div class="container">
    <h1>CREAR CATEGORIAS HABITACIÓN</h1><br>


    {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}

    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('nombre', 'Tipo habitación') !!}
            {!! Form::select('nombre', ['' => 'Seleccione', 'doble' => 'Habitación doble', 'triple' => 'Habitación
            triple', 'cuadruple' => 'Habitación para cuatro', 'quintuple' => 'Habitación para cinco'], null, ['class' =>
            'form-control',
            'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('precio', 'Precio habitación') !!}
            {!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Precio habitación',
            'required']) !!}
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