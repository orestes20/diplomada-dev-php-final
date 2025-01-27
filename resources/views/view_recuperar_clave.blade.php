<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Diplomada - Recovery Password</title>

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
    <link rel="stylesheet" href="assets/styles/style.login.css">
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
                    <form action="inicio.html">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="Introduzca su Direccion de correo Electrónico" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Nueva contraseña" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password2" placeholder="Confirmar contraseña" required />
                            </div>
                        <input class="button" type="submit" value="Recuperar contraseña" />
                        <!-- <button type="submit">Iniciar</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();
    
            const password = document.querySelector('input[name="password"]').value;
            const password2 = document.querySelector('input[name="password2"]').value;
    
            if (password === password2) {
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto!',
                    text: 'su contraseña ha sido cambiada.'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las contraseñas no coinciden. Por favor verifica e intenta de nuevo.'
                });
            }
        });
    </script>

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
</body>
</html>