<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.login.css">
    <script src="https://kit.fontawesome.com/2af1575d92.js" crossorigin="anonymous"></script>
    <title>Diplom₳d₳ - Sign In</title>
</head>
<body>

<div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2><img src="./assets/images/diplomada.png" alt=""></h2>
            </div>
            <div class="row clearfix">
                <div class="">
                    <form method="post" action="{{url('login')}}">
                        @csrf
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="Correo" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Contraseña" required />
                        </div>
                        <h4 class="iniciar-sesion">No tienes una cuenta? Registrate <a href="{{url('registro_diplomada')}}">aquí</a></h4>
                        <h4 class="iniciar-sesion"><a href="{{url('view_recuperar_clave')}}">¿Olvidaste tu contraseña?</a></h4>
                        <input class="button" type="submit" value="Iniciar Sesión" />
                        <!-- <button type="submit">Iniciar</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="POST" action="{{url('login')}}">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="email" placeholder="Email" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Password" required>
                    </div>
                    <div class="login__field">
                        <label for=""><a href="{{url('view_recuperar_clave')}}">Olvide mi Contraseña</a></label>
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">ingresar</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
                <div class="social-login">
                    <h3>Diplom₳d₳</h3>
                    <div class="social-icons">
                        {{-- <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a> --}}
                        <a class="social-login__icon" href="{{url('registro_diplomada')}}"><h3>Registrate</h3></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div> -->
</body>
</html>