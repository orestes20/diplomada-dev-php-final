@php
    $request = Request();
    $showButton = true;
    $edit= null;
    if (str_contains($request->getPathInfo(), 'view_actualizar_informacion')) {
        $showButton = false;
    }

    if (isset($usuario)) {
        $edit = isset($usuario);
        $usuario = $usuario->toArray();
    }

    if ($edit && count($usuario) > 0) {
        $usuario = $usuario[0];
    }

    $optionsGender = [['value' => 'masculino', 'text' => 'Masculino'], ['value' => 'femenino', 'text' => 'Femenino']];
    $breadCrumb = ['Usuarios', $edit ? 'Actualizar Información' : 'Nuevo Usuario'];
@endphp
@extends('layouts.admin')
@section('content')
    <div class="container">
        <x-page-info title="{{ $edit ? 'Actualizar Información' : 'Nuevo Usuario' }}" :breadCrumb="$breadCrumb"
            icon="fa-solid fa-gear" />

        @if ($showButton)
            <x-button-back />
        @endif

        <form method="POST" id="form" class="mt-4" novalidate
            action="{{ $edit ? 'actualizar_usuario' : 'crear_usuario' }}" redirect="">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control form-control-sm" id="nombre" name="nombre"
                        value="{{ $edit ? $usuario->nombre : '' }}" onkeypress="return soloLetras(event)" required onlyletters>
                    <div class="invalid-feedback" id="feedback-nombre"></div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control form-control-sm" id="apellido" name="apellido"
                        value="{{ $edit ? $usuario->apellido : '' }}" onkeypress="return soloLetras(event)" required onlyletters>
                    <div class="invalid-feedback" id="feedback-apellido"></div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="cedula">Cédula:</label>
                    <input type="number" class="form-control form-control-sm" id="cedula" name="cedula"
                        value="{{ $edit ? $usuario->cedula : '' }}" numeric required>
                    <div class="invalid-feedback" id="feedback-cedula"></div>
                </div>

                @if (!$edit && $showButton)
                    <div class="col-12 col-md-6 mb-3">
                        <label for="perfil">Perfil:</label>
                        <select name="perfil" id="perfil" class="form-select form-select-sm" required>
                            <option value="">- Seleccione -</option>
                            @foreach ($perfil as $key => $value)
                                <option value="{{ $value->id_perfil }}">{{ $value->perfil }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="feedback-perfil"></div>
                    </div>
                @endif
                <div class="col-12 col-md-6 mb-3">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control form-control-sm" id="correo" name="correo"
                        value="{{ $edit ? $usuario->correo : '' }}" required>
                    <div class="invalid-feedback" id="feedback-correo"></div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="telefono">Teléfono:</label>
                    <input type="number" class="form-control form-control-sm" id="telefono" name="telefono"
                        value="{{ $edit ? $usuario->celular : '' }}" numeric required>
                    <div class="invalid-feedback" id="feedback-telefono"></div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="fecha">Fecha de Nacimiento:</label>
                    <input class="form-control form-control-sm" type="date" name="fecha"
                        placeholder="fecha de nacimiento" id="fecha" max="{{ date('Y-m-d') }}"
                        value="{{ $edit ? $usuario->fecha_nac : '' }}" />
                    <div class="invalid-feedback" id="feedback-fecha"></div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="sexo">Género:</label>
                    <select name="sexo" id="sexo" class="form-select form-select-sm" required>
                        <option value="">- Seleccione -</option>
                        @foreach ($optionsGender as $key => $value)
                            <option value="{{ $value['value'] }}"
                                {{ $edit && $usuario->sexo == $value['value'] ? 'selected' : '' }}>
                                {{ $value['text'] }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback" id="feedback-sexo"></div>
                </div>

                @if (!$edit)
                    <div class="col-12 col-md-6 mb-3">
                        <label for="pass">Contraseña:</label>
                        <input class="form-control form-control-sm" type="password" name="pass" id="pass" required
                            autocomplete="new-password" />
                        <div class="invalid-feedback" id="feedback-pass"></div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="pass1">Repita su Contraseña:</label>
                        <input class="form-control form-control-sm" type="password" name="pass1" id="pass1"
                            confirm="pass" required />
                        <div class="invalid-feedback" id="feedback-pass1"></div>
                    </div>
                @endif
            </div>

            <x-button-submit>{{ $edit ? 'Actualizar Información' : 'Guardar Usuario' }}</x-button-submit>
        </form>
    </div>
@endsection
