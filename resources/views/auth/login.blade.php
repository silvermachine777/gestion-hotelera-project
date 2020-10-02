@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-7 bg-image"></div>
        <div class="col-md-8 col-lg-5">
            @if (session()->has('flash'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('flash')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h1 class="login-heading mb-4 text-center">Iniciar sesión</h1>
                            {{--Formulario login--}}
                            <form action="{{ route('login')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="cedula">Cedula</label>
                                    <input class="form-control" value="{{ old('cedula')}}" type="number" name="cedula"
                                        id="" placeholder="Cedula">
                                    {!! $errors->first('cedula', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input class="form-control" type="password" name="password" id=""
                                        placeholder="Contraseña">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>

                                <button type="submit"
                                    class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-2">Ingresar</button>
                                    @include('flash::message')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection