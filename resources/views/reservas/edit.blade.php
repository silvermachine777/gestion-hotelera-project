@extends('layouts.dashboard')

@section('title')
Reserva
@endsection

@section('ventana')

@include('flash::message')

<div class="container">
    <h1>EDITAR RESERVAS</h1><br>


    {!! Form::open(['route' => ['reservas.update', $reserva], 'method' => 'PUT']) !!}

    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('fecha_ingreso', 'Fecha de ingreso') !!}
            {!! Form::text('fecha_ingreso', $reserva->fecha_ingreso, ['class' => 'form-control', 'placeholder' => 'Fecha de ingreso', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('fecha_salida', 'Fecha de salida') !!}
            {!! Form::text('fecha_salida', $reserva->fecha_salida, ['class' => 'form-control', 'placeholder' => 'Fecha de salida', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('cantidad_personas', 'Cantidad de personas') !!}
            {!! Form::text('cantidad_personas', $reserva->cantidad_personas, ['class' => 'form-control', 'placeholder' => 'Cantidad de personas', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('categorias','Tipo de habitación') !!} <br>
            {!! Form::select('categoria_id', $categories, $reserva->categoria_id, ['class' => 'form-control', 'required']) !!}                         
        </div>  
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            {!! Form::label('habitaciones','Numero de habitación') !!} <br>
            {!! Form::select('habitacion_id', $typeRoom, $reserva->habitacion_id, ['class' => 'form-control', 'required']) !!}                         
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