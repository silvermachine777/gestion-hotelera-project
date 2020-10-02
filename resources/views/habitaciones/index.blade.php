@extends('layouts.dashboard')


@section('title')
Habitacion
@stop


@section('ventana')
@include('flash::message')

<div class="container">
    <h1>HABITACIONES</h1><br>
    <a href="{{ route('habitaciones.create') }}" class="btn btn-success">Crear</a><br><br>
    <table class="table table-hover" id="users-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripción de habitación</th>
                <th scope="col">Numero de habitación</th>
                <th scope="col">Piso</th>
                <th scope="col">Tipo de habitación</th>
                <th scope="col">Acciones</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($habitacion as $habitaciones)
                
            <tr>
                <td scope="col-sm">{{ $habitaciones->id}}</td>
                <td scope="col-sm">{{ $habitaciones->descripcion}}</td>
                <td scope="col-sm">{{ $habitaciones->numero_habitacion}}</td>
                <td scope="col-sm">{{ $habitaciones->piso}}</td>
                <td scope="col-sm">
                    @if ($habitaciones->categoria_id == 1)
                        Habitación doble                        
                    @elseif ($habitaciones->categoria_id == 2)
                        Habitación triple
                    @elseif ($habitaciones->categoria_id == 3)    
                        Habitación cuadruple
                    @else ($habitaciones->categoria_id == 4)    
                        Habitación quintuple
                    @endif                    
                </td>
                <td scope="col-sm">
                    <a href="{{ route('habitaciones.edit', $habitaciones->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>
                        Editar</a>
                    <a href="{{ route('habitaciones.destroy', $habitaciones->id)}}" onclick="return confirm('Desea eliminar la habitación seleccionada?')"
                        class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                        Eliminar</a>
                </td>

            </tr>

            @endforeach


        </tbody>
    </table>
    {!! $habitacion->render() !!}
</div>

@stop