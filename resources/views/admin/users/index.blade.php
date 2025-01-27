@extends('layouts.admin')
@php
    $tableHead = ['ID', 'Nombre', 'Cédula', 'Sexo', 'Correo', 'Teléfono', 'Rol', 'Acciones'];
    $tableFilters = [
        ['label' => 'ID', 'name' => 'id'],
        ['label' => 'Nombre', 'name' => 'nombre'],
        ['label' => 'Cédula', 'name' => 'cedula'],
        ['label' => 'Sexo', 'name' => 'sexo'],
        ['label' => 'Correo', 'name' => 'correo'],
        ['label' => 'Teléfono', 'name' => 'telefono'],
        ['label' => 'Rol', 'name' => 'rol'],
    ];

    $request = Request();
    $query = $request->query;
    $hasQuery = (bool) count($query);
    $rows = $query->get('rows') ? $query->get('rows') : 5;
    $order = $query->get('order');
    $page = $query->get('page') ? $query->get('page') : 1;
    $usuarios = $usuarios->toArray();

    $usuarios = array_map(
        function ($map, $index) {
            $map->id = $index + 1;
            return $map;
        },
        $usuarios,
        array_keys($usuarios),
    );

    switch ($order) {
        case 'ASC':
            ksort($usuarios);
            break;
        default:
            $usuarios = array_reverse($usuarios, true);
            break;
    }

    if ($hasQuery) {
        $usuarios = array_filter($usuarios, function ($obj) use ($query) {
            if (
                preg_match(
                    '/' . $query->get('nombre') . '/',
                    $obj->nombre . ' ' . $obj->apellido,
                    $coincidencias,
                    PREG_OFFSET_CAPTURE,
                ) &&
                preg_match('/' . $query->get('cedula') . '/', $obj->cedula, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('sexo') . '/', $obj->sexo, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('correo') . '/', $obj->correo, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('telefono') . '/', $obj->telefono, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('perfil') . '/', $obj->perfil, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('id') . '/', $obj->id, $coincidencias, PREG_OFFSET_CAPTURE)
            ) {
                return true;
            }

            return false;
        });
    }

    $total = count($usuarios);
    $usuarios = array_slice($usuarios, $rows * ($page - 1), $rows);

    $breadCrumb = ['Usuarios'];
@endphp

@section('content')
    <div class="container">
        <x-page-info title="Usuarios" :breadCrumb="$breadCrumb" icon="fa-solid fa-gear" />
        <x-button-form href="usuarios/form">Nuevo Usuario</x-button-form>
        <x-table :tableHead="$tableHead" :tableFilters="$tableFilters" :total="$total">
            @foreach ($usuarios as $key => $value)
                <tr>
                    <td><b>{{ $value->id }}</b></td>
                    <td>{{ $value->nombre }} {{ $value->apellido }}</td>
                    <td>{{ $value->cedula }}</td>
                    <td>{{ $value->sexo }}</td>
                    <td>{{ $value->correo }}</td>
                    <td>{{ $value->telefono }}</td>
                    <td>{{ $value->perfil }}</td>
                    <td>
                        <x-action-edit />
                        <x-action-change-status />
                    </td>
                </tr>
            @endforeach
        </x-table>
    </div>
@endsection
