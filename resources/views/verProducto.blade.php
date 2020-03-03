
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div id="container">

        @include('header')

        <div class="row">

            <!-- @include('navtemplate') -->

            @foreach ($producto as $values)

            <div class="col-md-6 d-block">

                    <img class="card-img-top"  src="{{url('assets/img/'.$values->imagen)}}" alt="Example">

            </div>



            <div class="col-md-6 d-block">
                    
                     
                    <h5 class="text-center">
                        {{$values->nombre}}
                    </h5>
                    <br>
                    <p>
                        {{$values->descripcion}}
                    </p>
                    @if ( $values->stock == 0) 
                        <p class="card-text" style="color: red">No hay stock</p>     
                    @else      
                    <hr>
                    <div style="text-align: center;">
                        <span style="text-align: center;"> 
    
                            Precio: {{$values->precio}}
                        </span> 
                        <span class="card-text" style="color: green">En stock</span>     
                    </div>
                <hr>
                <div class="text-center">
                    <a class="btn btn-primary text-center" style="color: white; " href="{{url('carrito/add/'.$values->Id)}}">Añadir al carro</a>
                </div>   
                    @endif       

                    

            </div>

            @endforeach

        </div>




    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>

</html>