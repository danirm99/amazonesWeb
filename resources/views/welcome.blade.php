<?php
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    
        .h1 {
            margin-bottom: .5rem;
            line-height: 1.1;
            color: #444;
            font-weight: 300;
    

        }            

        }
        
        .product-grid9,.product-grid9 .product-image9{position:relative}
        .product-grid9{font-family:Poppins,sans-serif;z-index:1}
        .product-grid9 .product-image9 a{display:block}
        .product-grid9 .product-image9 img{width:100%;height:auto}
        .product-grid9 .pic-1{opacity:1;transition:all .5s ease-out 0s}
        .product-grid9:hover .pic-2{opacity:1}
        .product-grid9 .product-full-view{color:#505050;background-color:#fff;font-size:16px;height:45px;width:45px;padding:18px;border-radius:100px 0 0;display:block;opacity:0;position:absolute;right:0;bottom:0;transition:all .3s ease 0s}
        .product-grid9 .product-full-view:hover{color:#c0392b}
        .product-grid9:hover .product-full-view{opacity:1}
        .product-grid9 .product-content{padding:12px 12px 0;overflow:hidden;position:relative}
        .product-content .rating{padding:0;margin:0 0 7px;list-style:none}
        .product-grid9 .rating li{font-size:12px;color:#ffd200;transition:all .3s ease 0s}
        .product-grid9 .rating li.disable{color:rgba(0,0,0,.2)}
        .product-grid9 .title{font-size:16px;font-weight:400;text-transform:capitalize;margin:0 0 3px;transition:all .3s ease 0s}
        .product-grid9 .title a{color:rgba(0,0,0,.5)}
        .product-grid9 .title a:hover{color:#c0392b}
        .product-grid9 .price{color:#000;font-size:17px;margin:0;display:block;transition:all .5s ease 0s}
        .product-grid9:hover .price{opacity:0}
        .product-grid9 .add-to-cart{display:block;color:#c0392b;font-weight:600;font-size:14px;opacity:0;position:absolute;left:10px;bottom:-20px;transition:all .5s ease 0s}
        .product-grid9:hover .add-to-cart{opacity:1;bottom:0}
        .product-grid9:hover{box-shadow:0 0 10px rgba(0,0,0,.3)}


    </style>
</head>

<body>
    <div id="container">


                    @include('header')

                    <div class="row" style=" margin-right: 5px; text-aling:center">

                    @include('navtemplate')

                        <div class="col-md-10 col-12" >
                            <br>
                            <h1 class="h1">Productos <strong>destacados</strong></h1>

                                <div class="row">
                                    @foreach ($productos as $values)

                                    <div class="col-md-3 col-sm-6">
                                        <div class="product-grid9">
                                            <div class="product-image9">
                                                <img class="card-img-top" src="{{url('assets/img/'.$values->imagen)}}" alt="Example">
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title">{{$values->nombre}}</h3>
                                                <div class="price"> {{$values->precio}}€</div>
                                                <a class="add-to-cart" style="text-align: center;"  href="ct/{{$values->NombreCategoria}}/{{$values->codigo}}">Ver producto</a>
                                            </div>
                                        </div>
                                        <br>
                                    </div>   
                                    <br><br><br>
                                    @endforeach             
                                </div>

                            <h1 class="h1">Aproveche estas ofertas <strong>temporales</strong></h1>

                            <div class="row">
                                    @foreach ($fecha_destacado as $values)

                                    <div class="col-md-3 col-sm-6">
                                        <div class="product-grid9">
                                            <div class="product-image9">
                                                <img class="card-img-top" src="{{url('assets/img/'.$values->imagen)}}" alt="Example">
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title">{{$values->nombre}}</h3>
                                                <div class="price"> {{$values->precio}}€</div>
                                                <a class="add-to-cart" style="text-align: center;"  href="ct/{{$values->NombreCategoria}}/{{$values->codigo}}">Ver producto</a>
                                            </div>
                                        </div>
                                        <br>
                                    </div>   
                                    <br><br><br>
                                    @endforeach             
                                </div>


                    
                            </div>
                        </div>

                    </div>

              
            
            
        <footer class="page-footer font-small  pt-4" style="background-color: #e3f2fd;">

        
            <div class="footer-copyright text-center py-3">
            Estas conectado desde : {{$obj->country}}  , {{$obj->regionName}} , {{$obj->city}} 
            </div>
            <!-- Copyright -->

        </footer>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>