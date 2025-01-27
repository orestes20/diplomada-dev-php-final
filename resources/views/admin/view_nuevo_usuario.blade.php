@extends('inicio')
@section('view_nuevo_usuario')
<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Registrar Nuevo Usuario</h4>
        <!-- /.box-title -->
        <div class="card-content">
            <form class="form-horizontal" method="post" action="{{url('crear_usuario')}}">
                @csrf
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inp-type-1" class="control-label">Nombre</label>
                        <input type="text" class="form-control"  id="nombre" onkeypress="return soloLetras(event)" required name="nombre" placeholder="Nombre de Usuario">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inp-type-1" class="control-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" onkeypress="return soloLetras(event)" required name="apellido" placeholder="Apellido del Usuario">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inp-type-1" class="control-label">Cédula</label>
                        <input type="text" class="form-control" id="cedula" maxlength="8" onkeypress="return SoloNumeros(event)" required name="cedula" placeholder="Cédula">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inp-type-2" class="control-label">Correo</label>
                        <input type="email" class="form-control" id="correo" required name="correo" placeholder="Correo">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inp-type-2" class="control-label">Perfil</label>
                        <select name="perfil" required id="perfil" class="form-control">
                            <option value="">- Seleccione -</option>
                            @foreach ($perfil as $key => $value)
                                <option value="{{$value->id_perfil}}">{{$value->perfil}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inp-type-3" class="control-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" maxlength="11" name="telefono" required placeholder="Telefono Célular">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inp-type-2" class="control-label">Fecha de Nacimiento</label>
                        <input class="form-control" type="date" name="fecha" required placeholder="fecha de nacimiento" id="fecha" max="{{date('Y-m-d')}}" required />
                    </div>
                </div>
                <div class="form-group col-sm-9">
                    <label for="inp-type-2" class="control-label">Sexo</label>
                    <ul class="list-inline">
                        <li>
                            <div class="radio info"><input type="radio" name="sexo" required value="masculino" id="radio-10"><label for="radio-10">Masculino</label></div>
                            <!-- /.radio -->
                        </li>
                        <li>
                            <div class="radio pink"><input type="radio" name="sexo" required value="femenino" id="radio-11"><label for="radio-11">Femenino</label></div>
                            <!-- /.radio -->
                        </li>
                    </ul>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inp-type-3" class="control-label">Contraseña</label>
                        <input type="password" class="form-control" id="pass" name="pass" required placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inp-type-3" class="control-label">Repita su Contraseña</label>
                        <input type="password" class="form-control" id="pass1" name="pass1" required placeholder="Password">
                    </div>
                </div>
                <div class="from-group">
                    <button type="submit" class="btn btn-success btn-rounded"> Guardar <i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content card white -->
</div>
@endsection