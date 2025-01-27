@extends('layouts.admin')
@php
    $tableHead = ['ID', 'Nombre', 'Apellido', 'Cédula', 'Sexo', 'Dirección', 'Correo'];
    $tableFilters = [
        ['label' => 'ID', 'name' => 'id'],
        ['label' => 'Nombre', 'name' => 'nombre'],
        ['label' => 'Apellido', 'name' => 'apellido'],
        ['label' => 'Cédula', 'name' => 'cedula'],
        ['label' => 'Sexo', 'name' => 'sexo'],
        ['label' => 'Dirección', 'name' => 'direccion'],
        ['label' => 'Correo', 'name' => 'correo'],
    ];

    $request = Request();
    $query = $request->query;
    $hasQuery = (bool) count($query);
    $rows = $query->get('rows') ? $query->get('rows') : 5;
    $order = $query->get('order');
    $page = $query->get('page') ? $query->get('page') : 1;
    $aspirante = $aspirante->toArray();

    $aspirante = array_map(
        function ($map, $index) {
            $map->id = $index + 1;
            return $map;
        },
        $aspirante,
        array_keys($aspirante),
    );

    switch ($order) {
        case 'ASC':
            ksort($aspirante);
            break;
        default:
            $aspirante = array_reverse($aspirante, true);
            break;
    }

    if ($hasQuery) {
        $aspirante = array_filter($aspirante, function ($obj) use ($query) {
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

    $total = count($aspirante);
    $aspirante = array_slice($aspirante, $rows * ($page - 1), $rows);

    $breadCrumb = ['Aspirantes'];
@endphp

@section('content')
    <div class="container">
        <x-page-info title="Aspirantes" :breadCrumb="$breadCrumb" icon="fa-solid fa-list" />
        <x-table :tableHead="$tableHead" :tableFilters="$tableFilters" :total="$total">
            @foreach ($aspirante as $key => $value)
                <tr>
                    <td><b>{{ $value->id }}</b></td>
                    <td>{{ $value->nombre }}</td>
                    <td>{{ $value->apellido }}</td>
                    <td>{{ $value->cedula }}</td>
                    <td>{{ $value->sexo }}</td>
                    <td>{{ $value->direccion }}</td>
                    <td>{{ $value->correo }}</td>
                </tr>
            @endforeach
        </x-table>
    </div>
@endsection
