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
		<div class="container-fluid">
			<table id="cart" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:50%">Producto</th>
						<th style="width:10%">Precio</th>
						<th style="width:10%">Cantidad</th>
						<th style="width:20%" class="text-center">Subtotal</th>
						<th style="width:10%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($micarro as $values)
					<tr>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-2 hidden-xs"><img src="{{url('assets/img/'.$values->attributes->imagen)}}" style="width: 100%;" alt="a" class="img-responsive" /></div>
								<div class="col-sm-10">
									<h4 id="{{$values->id}}" class="nomargin">{{$values->name}}</h4>
									<p>{{$values->attributes->descripcion}}</p>
								</div>
							</div>
						</td>
						<td data-th="Price">{{$values->price}} €</td>
						<td data-th="Quantity">

							@if	 ($values->quantity == 1)
								<button id="{{$values->id}}" disabled onclick="restar(this.id)" class="btn btn-outline-secondary btn-sm" style="float:left"></i>-</button>		

							@else
								<button id="{{$values->id}}" onclick="restar(this.id)" class="btn btn-outline-secondary btn-sm" style="float:left"></i>-</button>		

							@endif
								<input type="text" readonly style="   float: left; margin: 7px 7px 7px 7px; padding: 0 0 0 5px; font-size: 12px; color: #454545"  class=" input-sm text-center" size=" 1 "   value="{{$values->quantity}}">

							@if	 ($values->quantity >= $values->attributes->stock)
									<button id="{{$values->id}}" disabled onclick="sumar(this.id)" class="btn btn-outline-secondary btn-sm" style="float: left;"></i>+</button>
							@else

								<button id="{{$values->id}}" onclick="sumar(this.id)" class="btn btn-outline-secondary btn-sm" style="float: left;"></i>+</button>
							@endif	
						</td>
						<td data-th="Subtotal" class="text-center">{{$values->price * $values->quantity}} € </td>
						<td class="actions" data-th="">
							<button id="{{$values->id}}" onclick="borrar(this.id)" class="btn btn-danger btn-sm"></i>Borrar</button>
						</td>
					</tr>
					@endforeach
					
				</tbody>
				<tfoot>
					<tr>
						<td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir comprando</a></td>
						<td colspan="2" class="hidden-xs"><button onclick="vaciar()" class="btn btn-danger btn-sm"></i>Vaciar carrito</button></td>
						<td class="hidden-xs text-center"><strong>{{Cart::getTotal()}}€</strong></td>
						@if (session('dentro') == 1)
						<td><a href="{{ url('/pedido') }}" class="btn btn-success btn-block" >Comprar </a></td>
					
						@else
						<td><a  class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">Comprar </a></td>
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Tienes que hacer login</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Antes de poder proceder a comprar tus productos, tienes que hacer login.
									Haz click en el boton login para loggearte

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<a href="{{ url('/login') }}" type="button" class="btn btn-primary">Login</a>
								</div>
								</div>
							</div>
						</div>
						@endif
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="{{url('../resources/js/test.js')}}"></script>

</body>

</html>