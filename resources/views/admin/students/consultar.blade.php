@extends('layouts.admin')
@php
    $tableHead = ['ID', 'Nombre', 'Apellido', 'Cédula', 'Sexo', 'Correo','Telefono','Curso','Calificación'];
    $tableFilters = [
        ['label' => 'ID', 'name' => 'id'],
        ['label' => 'Nombre', 'name' => 'nombre'],
        ['label' => 'Apellido', 'name' => 'apellido'],
        ['label' => 'Cédula', 'name' => 'cedula'],
        ['label' => 'Sexo', 'name' => 'sexo'],
        ['label' => 'Telefono', 'name' => 'telefono'],
        ['label' => 'Correo', 'name' => 'correo'],
        ['label' => 'Perfil', 'name' => 'perfil'],
        ['label' => 'Transaccion', 'name' => 'transaccion'],
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
                preg_match('/' . $query->get('id') . '/i', $obj->id, $coincidencias, PREG_OFFSET_CAPTURE)&&
                preg_match('/' . $query->get('perfil') . '/i', $obj->perfil, $perfil, PREG_OFFSET_CAPTURE)&&
                preg_match('/' . $query->get('transaccion_documentos') . '/i', $obj->transaccion_documentos, $transaccion_documentos, PREG_OFFSET_CAPTURE)
                
            ) {
                return true;
            }

            return false;
        });
    }

    $total = count($aspirante);
    $aspirante = array_slice($aspirante, $rows * ($page - 1), $rows);

    $breadCrumb = ['Estudiantes'];
@endphp

@section('content')
</style>
    @csrf
    <div class="container">
        
        <x-page-info title="Notas Cargadas" :breadCrumb="$breadCrumb" icon="fa-solid fa-list" />
        <x-table :tableHead="$tableHead" :tableFilters="$tableFilters" :total="$total">
            @foreach ($aspirante as $key => $value)
                <tr>
                    <td><input name="id_estudiante[]" value="{{$value->id_estudiante}}" type="text" hidden><b>{{ $key + 1 }}</b></td>
                    <td>{{ $value->nombre }}</td>
                    <td>{{ $value->apellido }}</td>
                    <td>{{ $value->cedula }}</td>
                    <td>{{ $value->sexo }}</td>
                    <td>{{ $value->correo }}</td>
                    <td>{{ $value->celular }}</td> 
                    <td>{{ $value->curso }}<input type="tex" name="id_curso[]" value="{{$value->id_curso}}" hidden></td>
                    <td align="center">{{$value->notas}} pts.</td>                   
                </tr>
            @endforeach 
        </x-table>
        
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function SoloNumeros(evt){
        if(window.event){//asignamos el valor de la tecla a keynum
        keynum = evt.keyCode; //IE
        }
        else{
        keynum = evt.which; //FF
        }
        //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
        if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
            return true;
        }
        else{
            return false;
        }
    }
    function notas (val){
        aux = '#nota'+val;
        nota = $(aux).val();
        if(nota < 0 || nota > 20){
            swal({
                title: "Error en asignar nota",
                text: "La nota debe ser mayor a 0 y menor o igual a 20 puntos.",
                icon: "error",
                buttons: false,
                timer: 3000
            })
            $(aux).val('');
            return false;
        }
    }
</script>
@endsection
