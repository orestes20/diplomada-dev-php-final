@extends('inicio')
@section('consulta_documentos')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Verificar documentos para la creación de NFT</h4>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Sexo</th>
                    <th>Correo</th>
                    <th>Titulo</th>
                    <th>Notas</th>
                    <th>Aprobar - Rechazar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Sexo</th>
                    <th>Correo</th>
                    <th>Titulo</th>
                    <th>Notas</th>
                    <th>Aprobar - Rechazar</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($documentos as $key=>$value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->nombre}}</td>
                    <td>{{$value->apellido}}</td>
                    <td>{{$value->cedula}}</td>
                    <td>{{$value->sexo}}</td>
                    <td>{{$value->correo}}</td>
                    <td><a href="{{$value->titulo_pregrado_copia}}" target="_black">Ver Título</a></td>
                    <td><a href="{{$value->titulo_pregrado_copia}}" target="_black">Ver Notas</a></td>
                    <td>
                        <form action="{{url('actualizar_estatus_documento')}}" method="POST">
                            @csrf
                            <input type="text" name="id_estudiante" hidden value="{{$value->id_estudiante}}">
                            <button type="submit" name="aceptar" value="on" class="btn btn-circle btn-success btn-sm"><i class="fa fa-check"></i></button> - <button type="submit" name="rechazar" value="off" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-close"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection