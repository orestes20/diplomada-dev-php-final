<?php

namespace App\Http\Controllers;

use App\Models\model_estudiante;
use Illuminate\Http\Request;
use App\Models\model_usuario;
use App\Models\model_perfil;
use App\Models\model_persona;
use App\Models\model_curso;
use App\Models\model_curso_profesor;

class userAdminController extends Controller
{

    public function index()
    {
        // return view('login');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $usuario = $request->email;
        $clave = $request->password;
        $login = model_usuario::login($usuario,$clave);
        if ($login) {
            session(['usuario'=>$request->email]);
            return view('inicio');
        }else{
            return response()->json('Usuario o Contraseña Inválidos', 400);
        }
    }
    public function registro_diplomada()
    {
        // return view('registro');
        return view('auth.register');
    }

    public function registro(Request $request)
    {
        //dd($request->all());
        $registro_usuario = model_usuario::registro_usuario($request,3); //se envian 2 parametros el segundo es el perfil de usuario
        $id_registro = model_usuario::consulta_ultimo();
        $registro = model_estudiante::registro($request,$id_registro);

        //dd($registro_usuario);
        if($registro and $registro_usuario){
            return view('notf.notf1');
        }else{
            return view('notf.notf2');
        }
    }

    public function logout(Request $request){//cierre de sesión
        //liberar las variables de sesión
        // session()->forget('usuario');
        $request->session()->flush();
        return redirect('/admin/login');
    }

    public function val_cedula($cedula){ //validacion de cedula de identidad si existe o no en el sistema
        $existe = model_estudiante::comp_cedula($cedula);
        if(count($existe)==1)
            return "true";
        else
            return "false";
    }
    public function val_correo($correo){ //validación de correo electronico, si existe en el sistema o no
        $existe = model_estudiante::comp_correo($correo);
        if(count($existe)==1)
            return "true";
        else
            return "false";
    }
    public function view_recuperar_clave(){
        return view('view_recuperar_clave');
    }
    public function recuperar_clave(Request $request){
        $valida_usuario = model_estudiante::verificar_correo($request->email);
        if (!isset($valida_usuario)) {
            return view('notf.notf5');
        }else{
            return view('notf.notf6');
        }
    }
    public function view_nuevo_usuario(){
        //dd('llegue');
        $perfil = model_perfil::perfil();
        //dd($perfil);
        return view('admin.users.form',compact('perfil'));
    }
    public function crear_usuario(Request $request){
        
        $crear_usaurio = model_usuario::registro_usuario($request);
        $crear = model_persona::crear_usuario($request);
        //dd('llegue a este punto');
        // if($crear_usaurio == true && $crear == true)
        //     //dd('llegue de pana',$crear);    
        //     return view('notf.notf11');
        // else
        //     //dd('llegue1',$crear);
        //     return view('notf.notf12');
    }
    public function lista_usuario(){
        $usuarios = model_persona::lista();
        return view('admin.users.index',compact('usuarios'));
    }
    public function asignar_profesores(){
        $usuarios = model_persona::lista_profesores();
        //dd($usuarios);
        $cursos = model_curso::consulta_asignar();
        return view('admin.users.asignar_profesor',compact('usuarios','cursos'));
    }
    public function asignar (Request $request){
        //dd('llegue al controlador');
        model_curso_profesor::asignar($request);
        $usuarios = model_persona::lista_profesores();
        //dd($usuarios);
        $cursos = model_curso::consulta_asignar();
        return view('admin.users.asignar_profesor',compact('usuarios','cursos'));
    }
}
