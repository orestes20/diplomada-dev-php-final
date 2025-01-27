@extends('inicio')
@section('view_lista_usuario')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Usuarios</h4>
        <!-- /.box-title -->
        <div class="dropdown js__drop_down">
            <a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
            <!-- /.sub-menu -->
        </div>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre y Apellido</th>
                    <th>Cedula</th>
                    <th>Sexo</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Perfil</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Nombre y Apellido</th>
                    <th>Cedula</th>
                    <th>Sexo</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Perfil</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($usuarios as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->nombre}} {{$value->apellido}}</td>
                        <td>{{$value->cedula}}</td>
                        <td>{{$value->sexo}}</td>
                        <td>{{$value->correo}}</td>
                        <td>{{$value->telefono}}</td>
                        <td>{{$value->perfil}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-content -->
</div>
@endsection