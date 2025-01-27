@extends('inicio')
@section('view_actualizar_informacion')
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Actualizar datos</h4>
        <!-- /.box-title -->
        <div class="card-content">
            <form action="{{url('actualizar_usuario')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="inp-type-1" class="col-sm-3 control-label">Correo</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="correo" value="{{$usuario[0]->correo}}" name="correo" placeholder="correo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inp-type-3" class="col-sm-3 control-label">contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inp-type-3" class="col-sm-3 control-label">Repetir Contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inp-type-4" class="col-sm-3 control-label">Cédula</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly id="cedula" name="cedula" value="{{$usuario[0]->cedula}}" placeholder="Cédula">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inp-type-5" class="col-sm-3 control-label">Fecha de Nacimiento</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" readonly value="{{$usuario[0]->fecha_nac}}" id="fecha" name="fecha" placeholder="Cédula">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inp-type-5" class="col-sm-3 control-label"> Teléfono Celular</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="telefono_c" value="{{$usuario[0]->celular}}" name="telefono_c" placeholder="Teléfono Celular">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inp-type-5" class="col-sm-3 control-label"> Teléfono de Habitación</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="telefono_h" name="telefono_h" value="{{$usuario[0]->telefono_habitacion}}" placeholder="Teléfono de Habitación">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inp-type-5" class="col-sm-3 control-label"> Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return soloLetras(event)" value="{{$usuario[0]->nombre}}" id="nombre" placeholder="Nombre" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inp-type-5" class="col-sm-3 control-label"> Apellido</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" id="apellido" value="{{$usuario[0]->apellido}}" onkeypress="return soloLetras(event)" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inp-type-5" class="col-sm-3 control-label"> Sexo</label>
                    <div class="col-sm-9">
                        <ul class="list-inline">
                            @if ($usuario[0]->sexo=='masculino')
                                <li>
                                    <div class="radio info"><input type="radio" name="sexo" checked value="masculino" id="radio-10"><label for="radio-10">Masculino</label></div>
                                    <!-- /.radio -->
                                </li>
                                <li>
                                    <div class="radio pink"><input type="radio" name="sexo" value="femenino" id="radio-11"><label for="radio-11">Femenino</label></div>
                                    <!-- /.radio -->
                                </li>
                                @else
                                <li>
                                    <div class="radio info"><input type="radio" name="sexo" value="masculino" id="radio-10"><label for="radio-10">Masculino</label></div>
                                    <!-- /.radio -->
                                </li>
                                <li>
                                    <div class="radio pink"><input type="radio" name="sexo" checked value="femenino" id="radio-11"><label for="radio-11">Femenino</label></div>
                                    <!-- /.radio -->
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-success"> Guardar <i class="fa fa-check"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content card white -->
</div>
@endsection