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
        
        <div class="col-12" >

            <br>
            <h3>Revisar tu pedido</h3>

            <p>Al aceptar el pedido, aceptas  el Aviso de privacidad y las Condiciones de uso.</p>

            <br><br>


            <div class="col-sm-12">

                <div class="row">
                
                    <div class="col-md-9" >
                        <h4 style="text-align: center;">Datos del pedido</h4>
                        @include('tabla')

                    </div>
     

                    <div class="col-md-3"  style="text-align: center;">
                        
                        <h5>Confirmacion del pedido</h5><br>
                        <label  style="text-align: left;">Total: </label> <span style="text-align: right;">{{Cart::getTotal()}}€</span><br><br>
                        @if (Cart::getTotalQuantity() == 0)
						<td>Antes de proceder a comprar, debes tener algun item en el carro</td>
					
						@else
						<td><a href="{{ url('/pedido') }}" class="btn btn-success btn-block" >Comprar </a></td>
                        @endif
                    </div>
                </div>

            </div>

             
        </div>

	</div>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>