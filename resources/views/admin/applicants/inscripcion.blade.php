@php
    $request = Request();
    $showButton = true;
    $edit = false;

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
    $breadCrumb = ['Usuarios', $edit ? 'Formulario de Inscripcion' : 'Formulario de Inscripción'];
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <x-page-info title="{{ $edit ? 'Formulario de Inscripcion' : 'Inscripción' }}" :breadCrumb="$breadCrumb"
            icon="fa-solid fa-gear" />
    {{-- @if ($showButton)
        <x-button-back />
    @endif --}}
    <form method="POST" id="" action="guardar_inscripcion" class="mt-4" enctype="multipart/form-data" novalidate redirect="">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <label for="otros_telefonos">Otro Teléfono:</label>
                @if ($estudiante[0]->telefono_otros!=null)
                    <input type="text" class="form-control form-control-sm" onkeypress="return SoloNumeros(event)" id="otro_telefono" name="otro_telefono" required disabled >
                @else
                    <input type="text" class="form-control form-control-sm" onkeypress="return SoloNumeros(event)" id="otro_telefono" name="otro_telefono" required >
                @endif
                <div class="invalid-feedback" id="feedback-apellido"></div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="cedula">Cursos/Diplomada:</label>
                @if ($estudiante[0]->curso != null)
                <select name="curso" id="curso" disabled class="form-select form-select-sm" required>
                    <option value="">- Seleccione -</option>
                </select>
                @else
                <select name="curso"  id="curso" class="form-select form-select-sm" required>
                    <option value="">- Seleccione -</option>
                    @foreach ($cursos as $key => $value)
                        <option value="{{$value->id_curso }}">{{ $value->curso }}</option>
                    @endforeach 
                </select>
                @endif
                
                <div class="invalid-feedback" id="feedback-cedula"></div>
            </div>
            {{-- @if (!$edit && $showButton) --}}
            <div class="col-12 col-md-6 mb-3">  
                <label for="anterior">A realizado cursos anteriores?</label>
                @if ($estudiante[0]->realizo_curso_anterior == null)
                    <select name="cursos_ant" id="cursos_ant" class="form-select form-select-sm" required>
                        <option value="">- Seleccione -</option>
                        <option value="si">SI</option>
                        <option value="no">NO</option>
                    </select>
                @else
                    <select name="cursos_ant" id="cursos_ant" class="form-select form-select-sm" disabled required>
                        <option value="">- Seleccione -</option>
                    </select>
                @endif
                
                <div class="invalid-feedback" id="feedback-perfil"></div>
            </div>
            {{-- @endif --}}
            <div class="col-12 col-md-6 mb-3">
                <label for="curso_anterior">Curso Acterior:</label>
                @if ($estudiante[0]->curso_anterior == null)
                    <input type="curso_anterior" class="form-control form-control-sm" id="curso_anterior" name="curso_anterior" required>
                @else
                    <input type="curso_anterior" disabled class="form-control form-control-sm" id="curso_anterior" name="curso_anterior" required>
                @endif
                <div class="invalid-feedback" id="feedback-curso_anterior"></div>
            </div>
            <div class="col-12 col-md-6 md-3">
                <label for="foto_carnet">Foto Tipo Carnet:</label>
                @if ($estudiante[0]->foto_carnet==null)
                    <input type="file" id="foto_carnet" accept=".jpg .png .jpeg" class="filepond" data-allowed-formats="portrait square" name="foto_carnet" data-max-file-size="2M" data-max-height="2000" />
                @else
                    <input type="file" id="foto_carnet" accept=".jpg .png .jpeg" disabled class="filepond" data-allowed-formats="portrait square" name="foto_carnet" data-max-file-size="2M" data-max-height="2000" />
                @endif
               
            </div>
            <div class="col-12 col-md-6 md-3">
                <label for="fotocopia_cedula">Fotocopia del Documento de Identidad:</label>
                @if ($estudiante[0]->fotocopia_cedula == null)
                    <input type="file" id="fotocopia_cedula" accept=".jpg .png .jpeg" class="filepond" data-allowed-formats="portrait square" name="fotocopia_cedula" data-max-file-size="2M" data-max-height="2000" />
                @else
                    <input type="file" id="fotocopia_cedula" disabled accept=".jpg .png .jpeg" class="filepond" data-allowed-formats="portrait square" name="fotocopia_cedula" data-max-file-size="2M" data-max-height="2000" />
                @endif
                
            </div>
            <div class="col-12 col-md-6 md-3">
                <label for="curriculum">Curriculum:</label>
                @if ($estudiante[0]->curriculum == null)
                    <input type="file" id="curriculum" accept=".pdf" class="filepond" data-allowed-formats="portrait square" name="curriculum" data-max-file-size="2M" data-max-height="2000" />
                @else
                    <input type="file" id="curriculum" disabled accept=".pdf" class="filepond" data-allowed-formats="portrait square" name="curriculum" data-max-file-size="2M" data-max-height="2000" />
                @endif
                
            </div>
            <div class="col-12 col-md-6 md-3">
                <label for="partida_nacimiento">Partida de Nacimiento:</label>
                @if ($estudiante[0]->partida_nacimiento_copia == null)
                    <input type="file" id="partida_nacimiento" accept=".pdf" class="filepond" data-allowed-formats="portrait square" name="partida_nacimiento" data-max-file-size="2M" data-max-height="2000" />
                @else
                    <input type="file" id="partida_nacimiento" disabled accept=".pdf" class="filepond" data-allowed-formats="portrait square" name="partida_nacimiento" data-max-file-size="2M" data-max-height="2000" />
                @endif
                
            </div>
            <div class="col-12 col-md-6 md-3">
                <label for="titulo_postgrado">Título de postgrado:</label>
                @if ($estudiante[0]->titulo_pregrado_copia == null)
                    <input type="file" id="titulo_postgrado" accept=".pdf" class="filepond" data-allowed-formats="portrait square" name="titulo_postgrado" data-max-file-size="2M" data-max-height="2000" />
                @else
                    <input type="file" id="titulo_postgrado" accept=".pdf" disabled class="filepond" data-allowed-formats="portrait square" name="titulo_postgrado" data-max-file-size="2M" data-max-height="2000" />
                @endif
                
            </div>
            <div class="col-12 col-md-6 md-3">
                <label for="calificaciones_postgrado">Calificaciones de Postgrado:</label>
                @if ($estudiante[0]->partida_nacimiento_copia==null)
                    <input type="file" id="partida_nacimiento" accept=".pdf" class="filepond" data-allowed-formats="portrait square" name="calificaciones_postgrado" data-max-file-size="2M" data-max-height="2000" />
                @else
                    <input type="file" id="partida_nacimiento" disabled accept=".pdf" class="filepond" data-allowed-formats="portrait square" name="calificaciones_postgrado" data-max-file-size="2M" data-max-height="2000" />
                @endif
            </div>
            <div class="col-12 col-md-6 md-3">
                <label for="otros_titulos">Otros Titulos:</label>
                @if ($estudiante[0]->otros_titulos==null)
                    <input type="file" id="otros_titulos" accept=".pdf" class="filepond" data-allowed-formats="portrait square" name="otros_titulos" data-max-file-size="2M" data-max-height="2000" />
                @else
                    <input type="file" id="otros_titulos" accept=".pdf" disabled class="filepond" data-allowed-formats="portrait square" name="otros_titulos" data-max-file-size="2M" data-max-height="2000" />
                @endif
                
            </div>
            <div class="col-12 col-md-6 mb-3">  
                <label for="perfil">Nacionalidad:{{$estudiante[0]->id_nacionalidad}}</label>
                @if ($estudiante[0]->id_nacionalidad != null)
                    <select name="id_nacionalidad" id="id_nacionalidad" disabled class="form-select form-select-sm" required>
                        <option value="">- Seleccione -</option>
                    </select>
                @else
                    <select name="id_nacionalidad" id="id_nacionalidad" class="form-select form-select-sm" required>
                        <option value="">- Seleccione -</option>
                        @foreach ($nacionalidad as $key => $value)
                            <option value="{{$value->id_nacionalidad}}">{{$value->nacionalidad}}</option>
                        @endforeach
                    </select>
                @endif
                
                <div class="invalid-feedback" id="feedback-perfil"></div>
            </div>
            <div class="col-12 col-md-12 mb-3">
                <label for="nombre">Dirección:</label>
                @if ($estudiante[0]->direccion != null)
                    <textarea class="form-control form-control-sm" disabled name="direccion" id="direccion" cols="30" rows="10" required onlyletters></textarea>
                    
                    @else
                    <textarea class="form-control form-control-sm"  name="direccion" id="direccion" cols="30" rows="10" required onlyletters></textarea>
                @endif
               
                
            </div>
        </div>
        <x-button-submit>Inscribir</x-button-submit>

        <button type="button" class="btn btn-primary" style="border-radius:20px; background-color: #203767; border-color: #203767" id="hastala"> inscripción NFTs </button>
       
    </form>
</div>
@endsection