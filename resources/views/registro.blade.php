<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Diplomada - Sign In</title>
    <link rel="stylesheet" href="assets/styles/style.registro.css">
	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
    	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
    <script src="https://kit.fontawesome.com/2af1575d92.js" crossorigin="anonymous"></script>


</head>

<body>

<div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
                <h2><img src="./assets/images/diplomada.png" alt=""></h2>
        </div>
        <div class="row clearfix">
            <div class="">
                <form action="{{url('registro')}}" method="post">
                    @csrf
                    <!-- Correo -->
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                    <input type="email" name="correo" placeholder="Correo" id="correo" required />
                    </div>
                    <!-- Contraseña -->
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                    <input type="password" name="pass" placeholder="Contraseña" id="pass" maxlength="16" minlength="6" required />
                    </div>
                    <!-- confirmar contraseña -->
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                    <input type="password" name="pass1" placeholder="Repetir Contraseña" id="pass1" maxlength="16" minlength="6" required />
                    </div>
                    <!-- cedula -->
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-address-card"></i></span>
                    <input type="text" name="cedula" placeholder="Cédula" id="cedula" id="cedula" max="8" maxlength="8" onkeypress="return SoloNumeros(event)" required />
                    </div>
                    <!-- fecha de nacimiento -->
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-calendar"></i></span>
                    <input type="date" name="fecha" placeholder="fecha de nacimiento" id="fecha" max="{{date('Y-m-d')}}" required />
                    </div>
                    <!-- Telefono de habitacion -->
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                    <input type="text" name="telefono_h" placeholder="Telefono Habitación" id="telelfono" onkeypress="return SoloNumeros(event)" maxlength="12" required />
                    </div>
                    <!-- Telefono celular -->
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-mobile"></i></span>
                    <input type="text" name="telefono_c" placeholder="Telefono Celular" required />
                    </div>
                    <!-- Nombre -->
                    <div class="row clearfix">
                        <div class="col_half">
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                            <input type="text" name="nombre" onkeypress="return soloLetras(event)" id="nombre" placeholder="Nombre" required/>
                            </div>
                        </div>
                        <!-- Apellido -->
                        <div class="col_half">
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                            <input type="text" name="apellido" placeholder="Apellido" id="apellido" onkeypress="return soloLetras(event)" required />
                            </div>
                        </div>
                    </div>
                    <div class="input_field">
                        <div class="input_field"><span><i aria-hidden = "true" class="fa fa-user"></i></span>
                        <input type="text" name="wallet" placeholder="billetera" placeholder="billetra (wallet)" title="Ingrese la dirección Hash de su wallet" required >
                        </div>
                    </div>
                    <!-- tipo de sexo -->
                    <div class="input_field radio_option">
                        <input type="radio" name="sexo" value="masculino" id="rd1">
                        <label for="rd1">Masculino</label>
                        <input type="radio" name="sexo" value="femenino" id="rd2">
                        <label for="rd2">femenino</label>
                    </div>
                    <div class="input_field checkbox_option">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">Estoy de acuerdo con los términos y condiciones</label>
                    </div>
                    <div class="input_field checkbox_option">
                        <input type="checkbox" id="cb2">
                        <label for="cb2">Quiero recibir notificaciones de correo</label>
                    </div>
                    <h4 class="iniciar-sesion">Ya tienes una cuenta?. Inicia sesion <a href="{{url('/')}}">aquí</a></h4>
                    <input class="button" type="submit" value="Registrarse" />
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div id="single-wrapper">
	<form action="{{url('registro')}}" method="post" class="frm-single">
        @csrf
		<div class="inside">
			<div class="title"><strong>Registro de </strong>Nuevos Usuarios</div>

			<div class="frm-input">
                <input type="text" placeholder="Nombre" onkeypress="return soloLetras(event)" required name="nombre" class="frm-inp">
            </div>
            <div class="frm-input">
                <input type="text" placeholder="Apellido" onkeypress="return soloLetras(event)" required name="apellido" class="frm-inp">
            </div>
            <div class="frm-input">
                <input type="text" placeholder="Cedula" onkeypress="return SoloNumeros(event)" max="8" maxlength="8" required name="cedula" id="cedula" class="frm-inp">
            </div>
            <div class="frm-input">
                <input type="date" placeholder="Fecha de Nacimiento" max="{{date('Y-m-d')}}" required name="fecha" class="frm-inp">
            </div>
            <div class="frm-input">
                <input type="text" placeholder="Teléfono de habitación" onkeypress="return SoloNumeros(event)" maxlength="12" name="telelfono" class="frm-inp">
            </div>
            <div class="frm-input">
                <input type="text" placeholder="Teléfono Celulár" onkeypress="return SoloNumeros(event)" maxlength="12" name="telelfono" class="frm-inp">
            </div>
            <div class="frm-input">
                <ul class="list-inline">
                    <li>
                        <div class="radio info"><input type="radio" name="sexo" value="hombre" id="radio-10"><label for="radio-10">Hombre</label></div>
                    </li>
                    <li>
                        <div class="radio pink"><input type="radio" name="sexo" value="mujer" id="radio-11"><label for="radio-11">Mujer</label></div>
                    </li>
                </ul>
            </div>
            <div class="frm-input">
                <input type="email" placeholder="Email" required name="correo" id="correo" class="frm-inp">
            </div>
			<div class="frm-input">
                <input type="telel" placeholder="Password" required name="pass1" id="pass1" maxlength="16" minlength="6" class="frm-inp">
            </div>
            <div class="frm-input">
                <input type="password" placeholder="Repeat Password" required name="pass2" id="pass2" maxlength="16" minlength="6" class="frm-inp">
            </div>
            <button class="button login__submit" type="submit">
                <span class="button__text">Registrar</span>
                <i class="button__icon "></i>
            </button>
            <div class="login__field">
                <label for=""><a href="{{url('/')}}">Iniciar Sesión</a></label>
            </div>
			<div class="frm-footer">Diplomada © 2024.</div>
		</div>
	</form>
</div> -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<script src="assets/scripts/main.min.js"></script>
    <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

	<script src="assets/scripts/sweetalert.init.min.js"></script>
	<script src="assets/color-switcher/color-switcher.min.js"></script>
</body>
</html>