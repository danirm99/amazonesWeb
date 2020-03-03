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

</head>

<body>
	<div id="container">

        @include('header')
        <br><br>

        <div class="col-12" >
   
            @foreach ($pedidos as $values)

                        <div class="text-center"><span class="h3"><strong>Pedido {{$values->Id}}</strong></span></div> 
                        <button class="pdf btn btn-danger btn-sm float-right mr-2" id="{{$values->Id}}"><i class="fa fa-trash-o"></i>Imprimir PDF</button>
                        @if ($values->estado == "PP")
                        <button class="anular btn btn-danger btn-sm float-right mr-2" id="{{$values->Id}}" ><i class="fa fa-trash-o"></i>Anular pedido</button>
                        @endif
                        <br><br>

                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:20%">Producto</th>
                                    <th style="width:20%">Precio</th>
                                    <th style="width:20%">Cantidad</th>       
                    
                        
                  
                                </tr>
                            </thead>
                            <tbody>

                                @foreach  ($ventas as $values2)
                                
                            
                                    @if ($values->Id == $values2->pedido_id)
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-2 hidden-xs"><img src="{{url('assets/img/'.$values2->imagen)}}" style="width: 130%;" alt="a" class="img-responsive" /></div>
                                                <div class="col-sm-10">
                                                    <span id="{{$values2->id_producto}}" class="nomargin">{{$values2->NombreProducto}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">{{$values2->precio}} €</td>
                                        <td data-th="Quantity">
                                        {{$values2->cantidad}}
                                        </td>

                                    @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>

                                    <td><strong>Domicilio: {{$values->domicilio}}</strong></td>
                                    <td><strong>Precio total: {{$values->precio_total}}€</strong></td>
                                    @if ($values->estado == "PP")
                                       <td><strong>Estado: Pendiente de Procesar</strong></td>
                                    @elseif   ($values->estado == "P")
                                        <td><strong>Estado: Procesado</strong></td>
                                    @elseif   ($values->estado == "R")
                                        <td><strong>Estado: Recibido</strong></td>
                                    @elseif   ($values->estado == "A")
                                        <td><strong>Estado: Anulado</strong></td>                                        
                                    @endif    


                                </tr>
                     
                            </tfoot>                        
                        </table>
                        <br>

            @endforeach
             
        </div>

	</div>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="{{url('../resources/js/pedidos.js')}}"></script>

</body>

</html>