<style>
    @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

    .navbar-icon-top .navbar-nav .nav-link>.fa {
        position: relative;
        width: 36px;
        font-size: 24px;
    }

    .navbar-icon-top .navbar-nav .nav-link>.fa>.badge {
        font-size: 0.75rem;
        position: absolute;
        right: 0;
        font-family: sans-serif;
    }

    .navbar-icon-top .navbar-nav .nav-link>.fa {
        top: 3px;
        line-height: 12px;
    }

    .navbar-icon-top .navbar-nav .nav-link>.fa>.badge {
        top: -10px;
    }

    @media (min-width: 576px) {
        .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link>.fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link>.fa>.badge {
            top: -7px;
        }
    }

    @media (min-width: 768px) {
        .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link>.fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link>.fa>.badge {
            top: -7px;
        }
    }

    @media (min-width: 992px) {
        .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link>.fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link>.fa>.badge {
            top: -7px;
        }
    }

    @media (min-width: 1200px) {
        .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link>.fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
        }

        .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link>.fa>.badge {
            top: -7px;
        }
    }
</style>

<nav class="navbar navbar-icon-top navbar-expand-lg  navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img  src="{{ url('assets/img/test.png') }}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">

            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 200px">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        @if (session('dentro') == 0)
        <ul class="navbar-nav mr-auto">
            <a class="nav-link" href="{{ url('/login') }}">
            <br>
                Iniciar Sesion
            </a>
        </ul>
        @else
        <a class="nav-link" style="color:black">Bienvenido, {{session('usuario')}}</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Perfil
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/modificar') }}">Modificar cuenta</a>
                    <a class="dropdown-item" href="{{ url('/baja') }}">Darse de baja</a>
                    <a class="dropdown-item" href="{{ url('/ver_pedidos') }}">Ver pedidos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/salir') }}">Salir</a>
                </div>
            </li>


        </ul>

        @endif

        <ul class="navbar-nav ">

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/carrito/show') }}">
                    <i class="fa fa-shopping-cart">
                        <span class="badge badge-success">{{Cart::getTotalQuantity()}}</span>
                    </i>
                    Mi carro
                </a>
            </li>
        </ul>

    </div>
</nav>
