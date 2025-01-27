@php
    $request = Request();
    $baseUrl = $request->getBaseUrl();

    $tableHead = ['ID', 'Nombre', 'Cédula', 'Sexo', 'Correo', 'Título', 'Notas', 'Acciones'];
    $tableFilters = [
        ['label' => 'ID', 'name' => 'id'],
        ['label' => 'Nombre', 'name' => 'nombre'],
        ['label' => 'Cédula', 'name' => 'cedula'],
        ['label' => 'Sexo', 'name' => 'sexo'],
        ['label' => 'Correo', 'name' => 'correo'],
    ];

    $request = Request();
    $query = $request->query;
    $hasQuery = (bool) count($query);
    $rows = $query->get('rows') ? $query->get('rows') : 5;
    $order = $query->get('order');
    $page = $query->get('page') ? $query->get('page') : 1;
    $documentos = $documentos->toArray();

    $documentos = array_map(
        function ($map, $index) {
            $map->id = $index + 1;
            return $map;
        },
        $documentos,
        array_keys($documentos),
    );

    switch ($order) {
        case 'ASC':
            ksort($documentos);
            break;
        default:
            $documentos = array_reverse($documentos, true);
            break;
    }

    if ($hasQuery) {
        $documentos = array_filter($documentos, function ($obj) use ($query) {
            if (
                preg_match('/' . $query->get('nombre') . '/i', $obj->nombre, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('apellido') . '/i', $obj->apellido, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('cedula') . '/i', $obj->cedula, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('sexo') . '/i', $obj->sexo, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('correo') . '/i', $obj->correo, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('id') . '/i', $obj->id, $coincidencias, PREG_OFFSET_CAPTURE)
            ) {
                return true;
            }

            return false;
        });
    }

    $total = count($documentos);
    $documentos = array_slice($documentos, $rows * ($page - 1), $rows);

    $breadCrumb = ['Consulta de Documentos'];
@endphp

@extends('layouts.admin')

@section('content')
    <div class="container">
        <x-page-info title="Consulta de Documentos" :breadCrumb="$breadCrumb" icon="fa-solid fa-file" />
        <x-table :tableHead="$tableHead" :tableFilters="$tableFilters" :total="$total">
            @foreach ($documentos as $key => $value)
                <tr>
                    <td><b>{{ $value->id }}</b></td>
                    <td>{{ $value->nombre }} {{ $value->apellido }}</td>
                    <td>{{ $value->cedula }}</td>
                    <td>{{ $value->sexo }}</td>
                    <td>{{ $value->correo }}</td>
                    <td><a href="{{ $baseUrl . '/' . $value->titulo_pregrado_copia }}" target="_black">Ver Título</a></td>
                    <td><a href="{{ $baseUrl . '/' . $value->titulo_pregrado_copia }}" target="_black">Ver Notas</a></td>
                    <td>
                        {{-- <x-action-edit /> --}}
                        {{-- <x-action-change-status /> --}}
                        <form id="actualizarEstatusDocumentos" action="actualizar_estatus_documento" method="POST">
                            @csrf
                            <input type="text" name="id_estudiante" hidden value="{{ $value->id_estudiante }}" required
                                id="id_estudiante">
                            @switch($value->estatus_documentos)
                                @case('on')
                                <i class="fa fa-check"></i>
                                @break
                                @case('off')
                                <i class="fa fa-close"></i>
                                @break
                                @default
                                    <button type="submit" name="aceptar" value="on" class="btn btn-sm py-0" data-bs-toggle="tooltip" data-bs-title="Aprobar">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <button type="submit" name="rechazar" value="off" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-title="Rechazar">
                                        <i class="fa fa-close"></i>
                                    </button>
                                @break
                            @endswitch
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-table>
    </div>
@endsection
