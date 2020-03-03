
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


<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('../resources/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('../resources/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('../resources/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('../resources/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('../resources/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('../resources/css/main.css')}}">
<!--===============================================================================================-->


</head>
<body>


        <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title">

                <img  src="{{ url('assets/img/test.png') }}"  height='150'>

				</div>

                <form class="login100-form " method="post" action="{{ url('/check_reg') }}" >
                @csrf

					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
						<input class="input100" type="text"  id="usuario" name="usuario" placeholder="Usuario" value="{{$valores['usuario'] ??  ''}}">
                        <span style="color: red;">{{$errores["usuario"] ?? ''}}</span>

					</div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password"  id="password" name="password" placeholder="Password">
                        <span style="color: red;">{{$errores["password"] ?? ''}}</span>
					</div>

		 

                    <div class="wrap-input100 validate-input m-b-18">
                            <span class="label-input100">Email</span>
                            <input type="email" id="email" name="email" value="{{$valores['email'] ??  ''}}">
                            <span style="color: red;">{{$errores["email"] ?? ''}}</span>
                        </div>

        
                        <div class="wrap-input100 validate-input m-b-18">
                            <span class="label-input100">Nombre</span>
                            <input type="text"  id="nombre" name="nombre" placeholder="Nombre" value="{{$valores['nombre'] ??  ''}}">
                            <span style="color: red;">{{$errores["nombre"] ?? ''}}</span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18">
                            <span class="label-input100">Apellidos</span>
                            <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" value="{{$valores['apellidos'] ??  ''}}">
                            <span style="color: red;">{{$errores["apellidos"] ?? ''}}</span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18">
                            <span class="label-input100">DNI</span>
                            <input type="text" id="DNI" name="DNI" value="{{$valores['DNI'] ??  ''}}">
                            <span style="color: red;">{{$errores["DNI"] ?? ''}}</span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18">
                            <span class="label-input100">Direccion</span>
                            <input type="text"  id="direcion" name="direcion" value="{{$valores['direcion'] ??  ''}}">
                            <span style="color: red;">{{$errores["direcion"] ?? ''}}</span>
                        </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Registrarse
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
   
<!--===============================================================================================-->
    <script src="{{url('../resources/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{url('../resources/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{url('../resources/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{url('../resources/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

	<script src="{{url('../resources/js/main.js')}}"></script>

</body>



</html>