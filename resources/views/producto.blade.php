<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{public_path('css/bootstrap4/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        #navBarSearchForm input[type=search] {
            width: 1030px !important;
        }

        .h1 {
            text-align: center;


        }

        @media (max-width: 1300px) {

            #navBarSearchForm input[type=search] {
            width: 650px !important;

            } 
        }
    </style>
</head>

<body>
    <div id="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <a class="navbar-brand" href="{{ url('/') }}">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav mr-auto">



                <form class="form-inline navbar-right" id="navBarSearchForm">

                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </form>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Modificar cuenta</a>
                        <a class="dropdown-item" href="#">Ver pedidos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Salir</a>
                    </div>
                </li>
                <a href="#"><img src="{{ URL::to('/assets/img/carrito.png') }}" alt="Example" width="40" height="40" style="margin-left: 100px"></a>

            </ul>



        </nav>
        <h1 class="h1">Destacados</h1>
        <div class="row" style="margin-left: 5px; margin-right: 5px; text-aling:center">

            @foreach ($test as $values)
            
            <div class="col-md-3 col-sm-4 col-xs-6 ">

                <div class="card">
                    
    
                    <img class="card-img-top" src="http://localhost/proyecto-web/public/assets/img/{{$values->imagen}}" alt="Example">

                    <div class="card-body text-center">
                        <a href="categorias/{{$values->nombreCategoria}}/{{$values->codigo}}"><h5 class="card-title">{{$values->nombre}}</h5></a>
                        <p class="card-text">{{$values->anuncio}}</p>
                        <p class="card-text">{{$values->precio}}€, sin IVA </p>
                        
                    </div>
                    
                </div>
                <br>
            </div>
                
            @endforeach

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>