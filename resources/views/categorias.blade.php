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
        .h1 {
            text-align: center;


        }
    </style>
</head>

<body>
    <div id="container">
        @include('header')

        <div class="row" style=" margin-right: 5px; text-aling:center">

            @include('navtemplate')
            <div class="col-sm-10">
                <h1 class="h1">{{$test[0]->NombreCategoria}}</h1>
                <h5 class="h1">{{$test[0]->DescripcionCategoria}}</h1>
                    <div class="row">
                        @foreach ($test as $values)

                        <div class="col-md-4 col-sm-4 col-xs-6 ">

                            <div class="card">


                                <img class="card-img-top" src="{{url('assets/img/'.$values->imagen)}}" alt="Example">

                                <div class="card-body text-center">
                                    <a href="{{$values->NombreCategoria}}/{{$values->codigo}}">
                                        <h5 class="card-title">{{$values->nombre}}</h5>
                                    </a>
                                    <p class="card-text">{{$values->anuncio}}</p>
                                    <p class="card-text">{{$values->precio}}€ con IVA </p>
                                    @if ( $values->stock == 0)
                                    <p class="card-text" style="color: red">No hay stock</p>
                                    @endif
                                </div>

                            </div>
                            <br>
                        </div>

                        @endforeach
                        <div class="row" style=" width: 20%; margin: 0 auto;">
                            <?php echo $test->render(); ?>
                        </div>
                    </div>
            </div>


        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>