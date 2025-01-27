@extends('layouts.auth')

@section('content')
    <div class="row mb-3">
        <div class="col-12 col-md-8 offset-md-2">
            <div class="row text-center mt-4">
                <div class="col text-white">
                    <h4 style="font-weight: 600">Regístrate</h4>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col text-center">
                    <span class="text-white" style="font-size: 17px">
                        ¿Ya tienes una cuenta? Ingresa <a href="login" class="text-decoration-none">
                            <span style="color: #e1c564 !important" class="text-uppercase">aquí</span>
                        </a>
                    </span>
                </div>
            </div>

            <form class="text-start mt-5" id="registerForm" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                        <div class="invalid-feedback" id="feedback-nombre"></div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido">
                        <div class="invalid-feedback" id="feedback-apellido"></div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <input type="date" class="form-control shadow" id="fecha" placeholder="Fecha de Nacimiento"
                            name="fecha">
                        <div class="invalid-feedback" id="feedback-fecha"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <input type="email" class="form-control" id="correo" placeholder="Correo" name="correo">
                        <div class="invalid-feedback" id="feedback-correo"></div>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <input type="number" class="form-control" id="telefono_c" placeholder="Teléfono Celular"
                            name="telefono_c">
                        <div class="invalid-feedback" id="feedback-telefono_c"></div>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <input type="number" class="form-control" id="telefono_h" placeholder="Teléfono Habitación"
                            name="telefono_h">
                        <div class="invalid-feedback" id="feedback-telefono_h"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <input type="text" class="form-control shadow" id="cedula"
                            placeholder="Nro. de Identificación (Cédula)" name="cedula" numeric required>
                        <div class="invalid-feedback" id="feedback-cedula"></div>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass">
                        <div class="invalid-feedback" id="feedback-pass"></div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <input type="password" class="form-control" id="pass1" placeholder="Confirmar Contraseña"
                            name="pass1">
                        <div class="invalid-feedback" id="feedback-pass1"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <select class="form-select shadow" aria-label="Default select example" name="sexo" id="sexo"
                            required>
                            <option selected value="">Género</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                        <div class="invalid-feedback" id="feedback-sexo"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" id="wallet" placeholder="Wallet" name="wallet">
                        <div class="invalid-feedback" id="feedback-wallet"></div>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col text-white">
                        <input class="form-check-input" type="checkbox" id="terminos" value="true" name="terminos">
                        <label class="form-check-label" for="cb1">
                            Estoy de acuerdo con los términos y condiciones
                        </label>
                        <div class="invalid-feedback" id="feedback-terminos"></div>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col text-white">
                        <input class="form-check-input" type="checkbox" value="" id="cb2"
                            name="notificaciones">
                        <label class="form-check-label" for="cb2">
                            Quiero recibir notificaciones de correo
                        </label>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col col-12 col-md-6 offset-md-3 d-grid gap-2">
                        <button class="btn py-3 shadow fw-semibold rounded-5" type="submit"
                            style="background-color: #e1c564" style="font-size: 14px" id="submitButton">
                            <div id="spinner" class="spinner-border spinner-border-sm d-none" role="status"></div>
                            REGISTRARSE
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
