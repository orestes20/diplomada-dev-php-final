@php
    $breadCrumb = ['Cargar Documentos'];
@endphp
@extends('layouts.admin')
@section('content')
    <div class="container">
        <x-page-info title="Cargar Documentos" :breadCrumb="$breadCrumb" icon="fa-solid fa-upload" />
        <div class="row">
            <div class="col">
                <form action="{{url('aspirante/guardar_documentos')}}" method="POST" enctype="multipart/form-data" redirect="">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label> Título Universitario: </label>
                            @if ($titulo == null)
                                <input type="file" id="titulo" required class="filepond" name="titulo" />
                            @else
                                <input type="file" id="titulo" accept=".pdf" disabled class="filepond"
                                    data-allowed-formats="portrait square" required name="titulo" value="{{$titulo}}" data-max-file-size="2M"
                                    data-max-height="2000" />
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label> Notas Certificadas:</label>
                            @if ($notas == null)
                                <input type="file" id="notas" accept=".pdf" class="filepond"
                                    data-allowed-formats="portrait square" required name="notas" data-max-file-size="2M"
                                    data-max-height="2000"/>
                            @else
                                <input type="file" id="notas" accept=".pdf" disabled class="filepond"
                                    data-allowed-formats="portrait square" required name="notas" data-max-file-size="2M"
                                    data-max-height="2000" />
                            @endif
                        </div>
                        @if ($titulo != null && $notas != null)
                            @if ($estatus == 'on')
                                
                            @endif
                        @else
                            <x-button-submit >Guardar</x-button-submit>
                        @endif
                        <div class="col-lg-12 text-center mt-3">
                            <p class="help margin-top-10">Solo se permiten archivos con un máximo de 2MB en formato pdf.</p>
                        </div>
                    </div>
                </form>
                @if ($estatus == 'on' && $transaccion_documentos == null)
                    <!--cambiar el nombre hastala1-->
                    <button class="btn btn-primary" style="border-radius:20px; background-color: #203767; border-color: #203767" id="hastala1"> Generar NFTs </button>
                @endif
            </div>
        </div>
    </div>
@endsection
