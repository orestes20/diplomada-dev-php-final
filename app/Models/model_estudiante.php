<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use DB;

class model_estudiante extends Model
{
    use HasFactory;
    protected $table ='estudiante';
    protected $primaryKey = 'id_estudiante';

    public static function registro($data,$id_registro){

        //dd($data->all());
        $registro = new model_estudiante();
        $registro->nombre = $data->nombre;
        $registro->apellido = $data->apellido;
        $registro->cedula = $data->cedula;
        $registro->telefono_habitacion = $data->telefono_h;
        $registro->celular = $data->telefono_c;
        $registro->fecha_nac = $data->fecha;
        $registro->sexo = $data->sexo;
        $registro->correo = $data->correo;
        $registro->wallet = $data->wallet;
        $registro->id_usuario = $id_registro;
        $registro->save();
        //dd($registro);
        return true;
    }

    public static function comp_cedula($data){
        $existe = DB::table('estudiante')->select('cedula')->where('cedula','=',$data)->get();
        //dd($data,$existe);
        return $existe;
    }
    public static function comp_correo($data){
        $existe = DB::table('estudiante')->select('correo')->where('correo','=',$data)->get();
        return $existe;
    }
    public static function verificar_correo ($correo){
        $clave = DB::table('usuario')->select('usuario','clave')->where('usuario','=',$correo)->get();
        //dd(crypt::decrypt($clave[0]->clave));
        if (count($clave)==1) {
            return crypt::decrypt($clave[0]->clave);
        }else
            return 0;
        
    }
    public static function archivo($data1,$data2){
        //dd($data1,$data2);
        $id_estudiante = DB::table('estudiante')->select('id_estudiante')->where('id_usuario','=',session('id'))->get();
        //dd($id_estudiante[0]->id_estudiante);
        $estudiante=model_estudiante::find($id_estudiante[0]->id_estudiante);
        //dd($estudiante);
        $estudiante->titulo_pregrado_copia = $data1;
        $estudiante->notas_certificadas = $data2;
        $estudiante->save();
        return true;
    }
    public static function documentos($data){
        $documento = model_estudiante::find($data);
        //dd($documento);
        return $documento;
    }
    public static function consulta_documentos(){
        $documentos = DB::table('estudiante')->select('id_estudiante','nombre','apellido','cedula','sexo','correo','titulo_pregrado_copia','notas_certificadas','estatus_documentos')->where('titulo_pregrado_copia','!=',null)->where('notas_certificadas','!=',null)->get();
        return $documentos;
    }

    public static function actualizar($data){
        //dd($data);
        $actualizar = model_estudiante::find($data->id_estudiante);
        if ($data->aceptar == 'on')
            $actualizar->estatus_documentos = $data->aceptar;
        if ($data->rechazar == 'off')
            $actualizar->estatus_documentos = $data->rechazar;
        $actualizar->save();
        return true;
    }
    public static function lista_estudiantes(){
        //dd(session('id'));
        $lista_aspiranes= DB::table('estudiante as est')->select('est.id_estudiante','est.id_curso','est.id_estudiante','nombre','apellido','cedula','sexo','direccion','correo','celular','cur.curso','perfil','transaccion_documentos')->join('usuario as us','us.id_usuario','=','est.id_usuario')->join('perfil as per','per.id_perfil','=','us.id_perfil')->join('curso as cur','cur.id_curso','=','est.id_curso')->get();
        //dd($lista_aspiranes);
        return $lista_aspiranes;

    }
    public static function lista($id_perfil){
        //dd(session('id'));
        $lista_aspiranes= DB::table('estudiante as est')->select('est.id_estudiante','est.id_curso','est.id_estudiante','nombre','apellido','cedula','sexo','direccion','correo','celular','cur.curso','notas')->join('usuario as us','us.id_usuario','=','est.id_usuario')->join('perfil as per','per.id_perfil','=','us.id_perfil')->leftjoin('curso as cur','cur.id_curso','=','est.id_curso')->leftjoin('curso_profesor as c_p','c_p.id_curso','=','cur.id_curso')->leftjoin('notas as n','n.id_estudiante','=','est.id_estudiante')->where('us.id_perfil','=',$id_perfil)->where('c_p.id_profesor','=',session('id'))->whereNull('notas')->get();
        //dd($lista_aspiranes);
        return $lista_aspiranes;

    }

    public static function consulta_nomina($id_perfil){
        //dd(session('id'));
        $lista_aspiranes= DB::table('estudiante as est')->select('est.id_estudiante','est.id_curso','est.id_estudiante','nombre','apellido','cedula','sexo','direccion','correo','celular','cur.curso','notas')->join('usuario as us','us.id_usuario','=','est.id_usuario')->join('perfil as per','per.id_perfil','=','us.id_perfil')->leftjoin('curso as cur','cur.id_curso','=','est.id_curso')->leftjoin('curso_profesor as c_p','c_p.id_curso','=','cur.id_curso')->leftjoin('notas as n','n.id_estudiante','=','est.id_estudiante')->where('us.id_perfil','=',$id_perfil)->where('c_p.id_profesor','=',session('id'))->whereNotNull('notas')->get();
        //dd($id_perfil);
        return $lista_aspiranes;

    }
    
    public static function inscripcion($data){
        //dd($data->all());
        $id_estudiante = DB::table('estudiante as us')->select('us.id_estudiante')->where('id_usuario','=',session('id'))->get();
        $actualizar = model_estudiante::find($id_estudiante[0]->id_estudiante);
        $actualizar->telefono_otros = $data->otro_telefono;
        $actualizar->direccion = $data->direccion;
        $actualizar->realizo_curso_anterior = $data->cursos_ant;
        $actualizar->curso_anterior = $data->curso_anterior;
        $actualizar->foto_carnet = $data->foto_carnet;
        $actualizar->fotocopia_cedula = $data->fotocopia_cedula;
        $actualizar->curriculum = $data->curriculum;
        $actualizar->partida_nacimiento_copia = $data->partida_nacimiento;
        $actualizar->titulo_postgrado = $data->titulo_postgrado;
        $actualizar->otros_titulos = $data->otros_titulos;
        $actualizar->id_curso = $data->curso;
        $actualizar->id_nacionalidad = $data->id_nacionalidad;
        $actualizar->save();
       
        return true;
    }
    public static function hash_estudiante($data){
        $id_estudiante = DB::table('estudiante as us')->select('us.id_estudiante')->where('id_usuario','=',session('id'))->get();
        $actualizar = model_estudiante::find($id_estudiante[0]->id_estudiante);
        $actualizar->transaccion_documentos = $data;
        $actualizar->save();
        $usuario = model_usuario::find(session('id'));
        $usuario->id_perfil = 2;
        $usuario->save();
        if ($actualizar) {
            return true;
        }else{
            return false;
        }
    }

    public static function data_inscripcion(){
        $consultar = DB::table('estudiante as est')->select('nombre','apellido','cedula','sexo','fecha_nac','direccion','telefono_habitacion','telefono_otros','celular','correo','cur.curso')->leftjoin('curso as cur','cur.id_curso','=','est.id_curso')->where('est.id_usuario','=',session('id'))->get();
        //dd(session('id'),$consultar);
        return $consultar;
    }

    public static function consulta_estudiante(){
        $consulta = DB::table('estudiante as est')->select('nombre','apellido','cedula','sexo','fecha_nac','direccion','telefono_habitacion','telefono_otros','celular','correo','foto_carnet','fotocopia_cedula','curriculum','partida_nacimiento_copia','titulo_pregrado_copia','otros_titulos','cur.curso','realizo_curso_anterior','curso_anterior','nac.id_nacionalidad')->leftjoin('nacionalidad as nac','nac.id_nacionalidad','=','est.id_nacionalidad')->leftjoin('curso as cur','cur.id_curso','=','est.id_curso')->where('id_usuario','=',session('id'))->get();
        //dd($consulta);
        return $consulta;
    }

    public static function estudiante_notas($id){
        $id_estudiate = DB::table('estudiante as est')->select('id_estudiante')->where('id_usuario','=',$id)->get();
        $notas = DB::table('notas as n')->select('est.id_estudiante','per.nombre','per.apellido','per.cedula','curso','notas')->join('estudiante as est','est.id_estudiante','=','n.id_estudiante')->join('curso as cur','cur.id_curso','=','est.id_curso')->join('curso_profesor as c_p','c_p.id_curso','=','cur.id_curso')->join('usuario as us','us.id_usuario','=','c_p.id_profesor')->join('persona as per','per.id_usuario','=','us.id_usuario')->get();
        return $notas;
    }
}