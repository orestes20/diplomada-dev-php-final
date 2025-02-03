@extends('layouts.admin')
@php
    $tableHead = ['ID', 'Nombre', 'Apellido', 'curso','Calificación','Certificar'];
    $tableFilters = [
        ['label' => 'ID', 'name' => 'id'],
        ['label' => 'Nombre', 'name' => 'nombre'],
        ['label' => 'Apellido', 'name' => 'apellido'],
        ['label' => 'curso', 'name' => 'curso'],
        ['label' => 'notas', 'name' => 'notas'],
        ['label' => 'notas', 'name' => 'certificar']
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
                preg_match('/' . $query->get('curso') . '/i', $obj->curso, $coincidencias, PREG_OFFSET_CAPTURE) &&
                preg_match('/' . $query->get('notas') . '/i', $obj->notas, $notas, PREG_OFFSET_CAPTURE)
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
<style>
    .check{
        background-color: #203767;
        border-radius:100%;
        border-color: #203767;
    }

    .icon{
        color:#ffffff;
    }

</style>

    @csrf
    <div class="container">
        
        <x-page-info title="Notas Cargadas" :breadCrumb="$breadCrumb" icon="fa-solid fa-list" />
        <x-table :tableHead="$tableHead" :tableFilters="$tableFilters" :total="$total">
            @foreach ($aspirante as $key => $value)
                <tr>
                    <td><input id="id_estudiante" value="{{$value->id_estudiante}}" type="text" hidden><b>{{ $key + 1 }}</b></td>
                    <td>{{ $value->nombre }}</td>
                    <td>{{ $value->apellido }}</td>
                    <td>{{ $value->curso }}</td>
                    <td style="width: 10%" align="center">{{$value->notas}} pts.</td>
                    <td style="width: 5%">
                        @if ($value->notas <= 10)
                            <button id="diplomada" class="check btn btn-info btn-sl"><i class="icon fa fa-check"></i></button>
                        @else
                            <button disabled class="check btn btn-info btn-sl"><i class="icon fa fa-check"></i></button>
                        @endif

                    </td>               
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
   
    $('#certificado').click(function(){
        $.get('certificar/'+$('#id_estudiante').val(),function(data){
            var datos = [];
            datos['nombres']=data[0]['nombre'];
            datos['apellido']=data[0]['apellido'];
            datos['cedula']=data[0]['cedula'];
            datos['curso']=data[0]['curso'];
            datos['notas']=data[0]['notas'];
            console.log(datos);
        });
    });

</script>
@endsection
