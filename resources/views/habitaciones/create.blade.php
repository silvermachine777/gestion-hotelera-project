@extends('layouts.dashboard')

@section('title')
Habitación
@endsection

@section('ventana')

@include('flash::message')

<div class="container">
    <h1>CREAR HABITACIONES</h1><br>


    {!! Form::open(['route' => 'habitaciones.store', 'method' => 'POST']) !!}

    <div class="row">
        <div class="form-group col-md-5">            
            {!! Form::label('descripcion', 'Descripcion') !!}            
            {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion',
            'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">            
            {!! Form::label('numero_habitacion', 'Numero Habitación') !!}            
            {!! Form::text('numero_habitacion', null, ['class' => 'form-control', 'placeholder' => 'Numero Habitación',
            'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">            
            {!! Form::label('piso', 'Piso') !!}            
            {!! Form::text('piso', null, ['class' => 'form-control', 'placeholder' => 'Piso',
            'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('categorias','Tipo de habitación') !!} <br>
            {!! Form::select('categoria_id', $typeRoom, null, ['class' => 'form-control', 'required']) !!}                         
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