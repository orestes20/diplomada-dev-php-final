@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="row text-center">
                <div class="col text-white">
                    <h4 style="font-weight: 600">Bienvenid@</h4>
                </div>
            </div>

            <div class="row text-start mb-3">
                <div class="col">
                    <span class=" font-weight-normal text-white" style="font-size: 20px">
                        Ingresar:
                    </span>
                </div>
            </div>

            <div id="loginAlert" class="alert alert-danger alert-dismissible fade d-none" role="alert">
            </div>

            <form class="text-start" novalidate id="loginForm" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <div class="input-group has-validation">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" placeholder="correo@correo.com"
                                    name="email">
                                <label for="email">Correo</label>
                                <div class="invalid-feedback" id="feedback-email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Contraseña">
                            <label for="password">Contraseña</label>
                            <div class="invalid-feedback" id="feedback-password">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col text-end">
                        <span style="font-size: 17px; color: #e1c564">
                            ¿Olvidaste tu contraseña?
                        </span>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col col-12 col-md-6 offset-md-3 d-grid gap-2">
                        <button class="btn py-3 shadow fw-semibold rounded-5" type="submit"
                            style="background-color: #e1c564" style="font-size: 14px" id="submitButton">
                            <div id="spinner" class="spinner-border spinner-border-sm d-none" role="status"></div>
                            INGRESAR
                        </button>
                    </div>
                </div>

                <div class="row mb-3 mt-4">
                    <div class="col text-center">
                        <span class="text-white" style="font-size: 17px">
                            ¿No tienes una cuenta? Regístrate <a href="registro_diplomada" class="text-decoration-none">
                                <span style="color: #e1c564 !important" class="text-uppercase">aquí</span>
                            </a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
