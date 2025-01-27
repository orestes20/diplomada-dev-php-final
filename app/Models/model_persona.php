<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_usuario;
use DB;

class model_persona extends Model
{
    use HasFactory;
    protected $table = 'persona';
    protected $primaryKey = 'id_persona';

    public static function crear_usuario($data){
        //dd($data->all());
        $id_usuario = model_usuario::consulta_ultimo();
        //dd($id_usuario);
        $crear = new model_persona();
        $crear->nombre = $data->nombre;
        $crear->apellido = $data->apellido;
        $crear->cedula = $data->cedula;
        $crear->correo = $data->correo;
        $crear->telefono = $data->telefono;
        $crear->fecha_nacimiento = $data->fecha;
        $crear->sexo = $data->sexo;
        $crear->id_usuario = $id_usuario;
        $crear->save();
        return true;
    }
     public static function lista(){
        $usuarios=DB::table('persona as pers')->select('nombre','apellido','cedula','correo','telefono','correo','sexo','per.perfil')->join('usuario as us','us.id_usuario','=','pers.id_usuario')->join('perfil as per','per.id_perfil','=','us.id_perfil')->get();
        return $usuarios;
     }

     public static function lista_profesores(){
        $usuarios=DB::table('persona as pers')->select('pers.id_usuario','nombre','apellido','cedula','correo','telefono','correo','sexo','per.perfil')->join('usuario as us','us.id_usuario','=','pers.id_usuario')->join('perfil as per','per.id_perfil','=','us.id_perfil')->where('us.id_perfil','=',5)->orderby('pers.id_usuario','desc')->get();
        return $usuarios;
     }
}
