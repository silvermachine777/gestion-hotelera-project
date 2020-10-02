<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default')</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">

    {{--Cdn fontawesome --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    {{--Cdn Bootstrap Jquery --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="/img/logo.png">
</head>

<body>
    <div class="app">

        @yield('content')

        {{--Nav menu--}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a href="/dashboard" class="navbar-brand">
                    <img src="/img/logo.png" id="logoClinica" alt="logo">
                </a>
                <button type="button" data-toggle="collapse" data-target="#menu-content"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            </div>
            <div class="container user-name">
                <div class="row">
                    <div class="col-lg col-md col-sm col-xs mr-5">
                        <h6><strong>Bienvenido {{ auth()->user()->name }}</strong></h6>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Sesión iniciada</span>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg col-md col-sm col-xs">
                        <form action="{{ route('logout')}}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn" id="btn-logout">
                                <i class="fa fa-power-off"></i>
                                <span>Cerrar sesión</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        {{--Seccion Side menu y forms--}}
        <section>
            <aside>
                <div class="nav-side-menu">
                    <div class="menu-list">
                        <ul id="menu-content" class="menu-content collapse out">
                            {{--Lista usuarios--}}
                            <li data-toggle="collapse" data-target="#users">
                                <a href="#"><i class="fa fa-users" aria-hidden="true"></i>
                                    Administración de Usuarios <span class="arrow"></span></a>
                            </li>
                            <ul class="sub-menu collapse" id="users">
                                <li><a href="{{ route('users.index')}}">Usuarios</a></li>
                                <li><a href="{{ route('role.index')}}">Roles</a></li>
                            </ul>

                            {{--Lista reservas--}}
                            {{--  <li data-toggle="collapse" data-target="#reservas">
                                <a href="#"><i class="fa fa-database"></i> Reservas <span class="arrow"></span></a>
                            </li>
                            <ul class="sub-menu collapse" id="reservas">
                                <li><a href="{{ route('reservas.create') }}">Crear reservas</a></li>
                            <li><a href="">Modificar reservas</a></li>
                        </ul> --}}

                        {{--Lista habitaciones--}}
                        <li><a href="{{ route('habitaciones.index')}}"><i class="fa fa-bath" aria-hidden="true"></i>Habitaciónes</a></li>

                        {{--Lista categorias--}}
                        <li><a href="{{ route('category.index') }}"><i class="fa fa-cubes" aria-hidden="true"></i>Categorias</a></li>

                        </ul>
                    </div>
                </div>
            </aside>

            {{--Seccion forms--}}
            <section class="forms-section">
                @yield('ventana')
            </section>

        </section>





    </div>



</body>

</html>