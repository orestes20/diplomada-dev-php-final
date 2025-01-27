<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use App\Models\model_estudiante;
use DB;

class model_usuario extends Model
{
    use HasFactory;
    protected $table ='usuario';
    protected $primaryKey = 'id_usuario';
    
    
    public static function login($usuario,$clave){
        //dd($usuario,crypt::encrypt($clave));
        $login = DB::table('usuario as us')->select('us.id_usuario','usuario','clave','us.id_perfil','est.nombre','est.apellido','per.perfil','est.transaccion_documentos')->join('perfil as per','per.id_perfil','=','us.id_perfil')->join('estudiante as est','est.id_usuario','=','us.id_usuario')->where('usuario','=',$usuario)->get();
        $user = DB::table('usuario as us')->select('us.id_usuario','usuario','clave','us.id_perfil','per.perfil','pers.nombre','pers.apellido')->join('perfil as per','per.id_perfil','=','us.id_perfil')->join('persona as pers','us.id_usuario','=','pers.id_usuario')->where('usuario','=',$usuario)->get();
        //dd($login,$user);

        if (count($login)!=0) {
            $clave_db=crypt::decrypt($login[0]->clave);
            //dd($clave_db);
            if ($clave_db==$clave)
                {
                    session(['id'=>$login[0]->id_usuario]);
                    session(['id_perfil'=>$login[0]->id_perfil]);
                    session(['nombre'=>$login[0]->nombre.' '.$login[0]->apellido]);
                    session(['perfil'=>$login[0]->perfil]);
                    session(['documientos'=>$login[0]->transaccion_documentos]);
                    return true;
                }
            else
                return false;
        }
        if (count($user)!=0) {
            $clave_db=crypt::decrypt($user[0]->clave);
            //dd($user[0]);
            if ($clave_db==$clave)
                {
                    session(['id'=>$user[0]->id_usuario]);
                    session(['id_perfil'=>$user[0]->id_perfil]);
                    session(['nombre'=>$user[0]->nombre.' '.$user[0]->apellido]);
                    session(['perfil'=>$user[0]->perfil]);
                    return true;
                }
            else
                return false;
        }
    }

    public static function registro_usuario($data1){
        //dd($data1->all(),$data);
        $usuario_registro = new model_usuario();
        $usuario_registro->usuario = $data1->correo;
        $usuario_registro->clave = Crypt::encrypt($data1->pass1);
        if ($data1->perfil!=null) {
            $usuario_registro->id_perfil = $data1->perfil;
        }else{
            $usuario_registro->id_perfil = 3;
        }
        $usuario_registro->save();
        return true;
    }

    public static function consulta_ultimo(){
        $ultimo = DB::table('usuario')->select('id_usuario')->orderby('id_usuario','desc')->limit('1')->get();
        return $ultimo[0]->id_usuario;
    }
    public static function consulta($data){
        $usuario = DB::table('usuario as us')->select('nombre','apellido','cedula','sexo','fecha_nac','telefono_habitacion','celular','correo')->join('estudiante as est','est.id_usuario','=','us.id_usuario')->where('us.id_usuario','=',$data)->get();
        //dd('llegue',$usuario[0]->sexo);
        return $usuario;
    }

    public static function actualizar_usuario($data){
        //dd($data->all());
        $actualizar=model_usuario::find(session('id'));
        $actualizar->usuario = $data->correo;
        $actualizar->clave = Crypt::encrypt($data->pass1);
        $actualizar->save();
        $id_estudiante=DB::table('estudiante')->select('id')->where('id_usuario','=',session('id'))->get();
        //dd($data->all());
        $actualizar_estudainte = model_estudiante::find($id_estudiante[0]->id);
        $actualizar_estudainte->nombre = $data->nombre;
        $actualizar_estudainte->apellido = $data->apellido;
        $actualizar_estudainte->cedula = $data->cedula;
        $actualizar_estudainte->sexo = $data->sexo;
        $actualizar_estudainte->telefono_habitacion = $data->telefono_h;
        $actualizar_estudainte->celular = $data->telefono_c;
        $actualizar_estudainte->correo = $data->correo;
        $actualizar_estudainte->save();
        return true;
        //dd($actualizar_estudainte);
    }
    public static function cear_usuario($data){

    }
}