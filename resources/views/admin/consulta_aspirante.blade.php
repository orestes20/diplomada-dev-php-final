@extends('inicio')
@section('consulta_aspirante')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Consulta de Aspirantes</h4>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Sexo</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Sexo</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($aspirante as $key=>$value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->nombre}}</td>
                    <td>{{$value->apellido}}</td>
                    <td>{{$value->cedula}}</td>
                    <td>{{$value->sexo}}</td>
                    <td>{{$value->direccion}}</td>
                    <th>{{$value->correo}}</th>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <!-- /.box-content -->
</div>
@endsection