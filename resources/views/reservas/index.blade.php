@extends('layouts.dashboard')

@section('title')
Reserva
@stop


@section('ventana')

<div class="container">
    <h1>RESERVAS</h1><br>
    <a href="{{ route('reservas.create')}}" class="btn btn-success">Crear</a><br><br>
    <table class="table table-hover" id="users-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha de ingreso</th>
                <th scope="col">Fecha de salida</th>
                <th scope="col">Cantidad de personas</th>
                <th scope="col">Tipo de habitación</th>
                <th scope="col">Numero de habitación</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($reserva as $reservas )
                
            <tr>
                <td scope="col-sm">{{$reservas->id}}</td>
                <td scope="col-sm">{{$reservas->fecha_ingreso}}</td>
                <td scope="col-sm">{{$reservas->fecha_salida}}</td>
                <td scope="col-sm">{{$reservas->cantidad_personas}}</td>
                <td scope="col-sm">
                    @if ($reservas->categoria_id == 1)
                        Habitación doble                        
                    @elseif ($reservas->categoria_id == 2)
                        Habitación triple
                    @elseif ($reservas->categoria_id == 3)    
                        Habitación cuadruple
                    @else ($reservas->categoria_id == 4)    
                        Habitación quintuple
                    @endif 
                </td>
                <td scope="col-sm">{{$reservas->numero_habitacion}}</td>
                <td scope="col-sm">
                    <a href="{{ route('reservas.edit', $reservas->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>
                        Editar</a>
                    <a href="" onclick="return confirm('Desea eliminar la categoria seleccionada?')"
                        class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                        Eliminar</a>
                </td> 

            </tr>

            @endforeach


        </tbody>
    </table>

    {{--  {!! $reserva->render() !!}  --}}

</div>



    
@endsection