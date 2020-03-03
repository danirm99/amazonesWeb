<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{public_path('css/bootstrap4/bootstrap.min.css')}}">
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    @foreach ($pedidos as $values)

    
    <table id="customers">
            <tr>
                <th style="width:30%">Img</th>
                <th style="width:40%">Producto</th>
                <th style="width:20%">Precio</th>
                <th style="width:10%">Cantidad</th>



            </tr>

            @foreach ($ventas as $values2)


            @if ($values->Id == $values2->pedido_id)
            <tr>
                <td data-th="Img">
                    <div class="row">

                        <div class="col-sm-12 ">
                            <img src="{{url('assets/img/'.$values2->imagen)}}" style="width: 700%;" alt="a"  />
                        </div>

                    </div>
                </td>
                <td data-th="Product">
                    <div class="row">

                        <div class="col-sm-12">
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
        <tfoot>
            <tr>

             @if ($values->estado == "PP")
                <td><strong>Estado: Pendiente de Procesar</strong></td>
             @elseif   ($values->estado == "P")
                <td><strong>Estado: Procesado</strong></td>
             @elseif   ($values->estado == "R")
                <td><strong>Estado: Recibido</strong></td>
            @elseif   ($values->estado == "A")
                <td><strong>Estado: Anulado</strong></td>
             @endif
                <td ><strong>Precio total: {{$values->precio_total}}€</strong></td>
                <td colspan="2"><strong>Direccion de entrega: {{$values->domicilio}}</strong></td>
            </tr>

        </tfoot>
    </table>
    <br>

    @endforeach
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>