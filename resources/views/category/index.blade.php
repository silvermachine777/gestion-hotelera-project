@extends('layouts.dashboard')


@section('title')
Categoria
@stop


@section('ventana')
@include('flash::message')

<div class="container">
    <h1>CATEGORIAS</h1><br>
    <a href="{{ route('category.create')}}" class="btn btn-success">Crear</a><br><br>
    <table class="table table-hover" id="users-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo de habitación</th>
                <th scope="col">Precio habitación</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td scope="col-sm">{{$category->id}}</td>
                <td scope="col-sm">{{$category->nombre}}</td>
                <td scope="col-sm">{{$category->precio}}</td>
                <td scope="col-sm">
                    <a href="{{ route('category.edit', $category->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>
                        Editar</a>
                    <a href="{{ route('category.destroy', $category->id)}}" onclick="return confirm('Desea eliminar la categoria seleccionada?')"
                        class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                        Eliminar</a>
                </td> 

            </tr>
            @endforeach



        </tbody>
    </table>
    {!! $categories->render() !!}
</div>

@stop