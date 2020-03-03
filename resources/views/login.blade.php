
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

                <form class="login100-form " method="post" action="{{ url('/check_login') }}" >
                @csrf

					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" id="nombre" name="nombre" placeholder="Usuario" value="{{$valores['nombre'] ??  ''}}">
                        <span style="color: red;">{{$error ?? ''}}</span>

					</div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password"  id="password" name="password" placeholder="Password">
                        <span style="color: red;">{{$errores ?? ''}}</span>
					</div>

					<div class="flex-sb-m w-full p-b-30">

						<div>
							<a href="{{ url('/registrar') }}" class="txt1">
                            ¿No tienes cuenta?
                            </a>
                            <a href="{{ url('/recuperar') }}" class="txt1">
							¿Olvidaste la contraseña?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
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