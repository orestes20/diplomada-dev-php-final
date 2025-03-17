<?php

namespace App\Http\Controllers;

use App\Models\model_estudiante;
use App\Models\model_usuario;
use Illuminate\Http\Request;
use App\Models\model_perfil;
use App\Models\model_curso;
use App\Models\model_nacionalidad;
use App\Models\model_nota;
use DB;

class aspiranteController extends Controller
{

    public function view_cargar_documentos()
    {
        $id_estudiante = DB::table('estudiante')->select('id_estudiante')->where('id_usuario','=',session('id'))->get();
        //dd($id_estudiante);
        $verificar = model_estudiante::documentos($id_estudiante[0]->id_estudiante);
        //dd($verificar);
        if ($verificar == null) {
            $titulo = null;
            $notas = null;
            $estatus = 'off';
            $transaccion_documentos = null;
        }else{
            $titulo = $verificar->titulo_pregrado_copia;
            $notas = $verificar->notas_certificadas;
            $estatus = $verificar->estatus_documentos;
            $transaccion_documentos = $verificar->transaccion_documentos; 
        }
        return view('aspirante.view_cargar_documentos',compact('titulo','notas','estatus','transaccion_documentos'));
    }
    public function guardar_documentos(Request $request)
    {
        //dd($request->titulo);
        $doc=$request->file('titulo');
        $ext=strstr($request->file('titulo')->getClientOriginalName(),".",false);
        $titulo="titulo".'_'.session('id').'_'.date('Y-m-d').$ext;
        $url= 'titulo/'.$titulo;

        $doc1=$request->file('notas');
        $ext=strstr($request->file('notas')->getClientOriginalName(),".",false);
        $notas="notas".'_'.session('id').'_'.date('Y-m-d').$ext;
        $url1= 'notas/'.$notas;
        //dd($url,$url1);
        $doc->move('titulo/', $url);
        $doc1->move('notas/', $url1);
        $guardado= model_estudiante::archivo($url,$url1);
        //dd('prueba');
        $guardado=true;
        if ($guardado) {
            return view('notf.notf7');
            //dd('me detuve');
        }else{
            return view('notf.notf8');
        }
    }
    public function view_actualizar_informacion() //actualmente no esta funcionando
    {
        $usuario = model_usuario::consulta(session('id'));
        //dd($usuario);
        return view('admin.users.form', compact('usuario'));
    }
    public function actualizar_usuario(Request $request)
    {
        $actualizar_usuario = model_usuario::actualizar_usuario($request);
        if ($actualizar_usuario) {
            return view('notf.notf9');
        }else{
            return view('notf.notf10');
        }
    }
    public function revisar_documentos (){
        $documentos = model_estudiante::consulta_documentos();
        //dd($documentos);
        return view('admin.analyst.consult_documents',compact('documentos'));
        //dd($documentos);
    }
    public function actualizar_estatus_documento(Request $request){
        $actualizar = model_estudiante::actualizar($request);
        if ($actualizar) {
            return view('notf.notf17');
            //return response()->json('¡Cambio de estatus realizado con éxito!', 200);
        }
        else{
            return response()->json('Error', 500);
        }
    }
    public function lista_aspirantes(){
        $aspirante = model_estudiante::lista(3);
        //dd($aspirante);
        return view('admin.applicants.index',compact('aspirante'));
    }
    public function lista_estudiantes(){
        
        $aspirante = model_estudiante::lista_estudiantes();
        //dd($aspirante);
        return view('admin.students.index', compact('aspirante'));
    }

    public function view_inscripción(){
        $cursos = model_curso::cursos();
        $nacionalidad = model_nacionalidad::nacionalidad();
        $estudiante = model_estudiante::consulta_estudiante();
        return view('admin.applicants.inscripcion',compact('cursos','nacionalidad','estudiante'));
    }

    public function guardar_inscripcion(Request $request)
    {
        $punto=$request->file('foto_carnet');
        //dd($request->all());
        
        $ext=strstr($request->file('foto_carnet')->getClientOriginalName(),".",false);
        $foto_carnet="foto_carnet".'_'.session('id').'_'.date('Y-m-d').$ext;
        $punto->move('foto_carnet',$foto_carnet);
        $url= 'foto_carnet/'.$foto_carnet;
        $request->foto_carnet = $url;
        
        $punto=$request->file('fotocopia_cedula');
        $ext=strstr($request->file('fotocopia_cedula')->getClientOriginalName(),".",false);
        $fotocopia_cedula="fotocopia_cedula".'_'.session('id').'_'.date('Y-m-d').$ext;
        $punto->move('fotocopia_cedula',$fotocopia_cedula);
        $url= 'fotocopia_cedula/'.$fotocopia_cedula;
        $request->fotocopia_cedula = $url;

        $punto=$request->file('curriculum');
        $ext=strstr($request->file('curriculum')->getClientOriginalName(),".",false);
        $curriculum="curriculum".'_'.session('id').'_'.date('Y-m-d').$ext;
        $punto->move('curriculum',$curriculum);
        $url= 'curriculum/'.$curriculum;
        $request->curriculum = $url;

        $punto=$request->file('partida_nacimiento');
        $ext=strstr($request->file('partida_nacimiento')->getClientOriginalName(),".",false);
        $partida_nacimiento="partida_nacimiento".'_'.session('id').'_'.date('Y-m-d').$ext;
        $punto->move('partida_nacimiento',$partida_nacimiento);
        $url= 'partida_nacimiento/'.$partida_nacimiento;
        $request->partida_nacimiento = $url;

        // $punto=$request->file('titulo_postgrado');
        // $ext=strstr($request->file('titulo_postgrado')->getClientOriginalName(),".",false);
        // $titulo_postgrado="titulo_postgrado".'_'.session('id').'_'.date('Y-m-d').$ext;
        // $punto->move('titulo_postgrado',$titulo_postgrado);
        // $url= 'titulo_postgrado/'.$titulo_postgrado;
        // $request->titulo_postgrado = $url;

        $punto=$request->file('calificaciones_postgrado');
        $ext=strstr($request->file('calificaciones_postgrado')->getClientOriginalName(),".",false);
        $calificaciones_postgrado="calificaciones_postgrado".'_'.session('id').'_'.date('Y-m-d').$ext;
        $punto->move('calificaciones_postgrado',$calificaciones_postgrado);
        $url= 'calificaciones_postgrado/'.$calificaciones_postgrado;
        $request->calificaciones_postgrado = $url;
        
        $punto=$request->file('otros_titulos');
        $ext=strstr($request->file('otros_titulos')->getClientOriginalName(),".",false);
        $otros_titulos="otros_titulos".'_'.session('id').'_'.date('Y-m-d').$ext;
        $punto->move('otros_titulos',$otros_titulos);
        $url= 'otros_titulos/'.$otros_titulos;
        $request->otros_titulos = $url;
        $inscribir = model_estudiante::inscripcion($request);
        //dd($inscribir);
        if ($inscribir) {
            return view('notf.notf15');
        }
        else 
            return view('notf.notf16');
    }
    public function data_inscripcion(){
        $datos = model_estudiante::data_inscripcion();
        return $datos;
    }

    public function nomina(){
        $aspirante = model_estudiante::lista(2);
        //dd($aspirante);
        return view('admin.students.nomina', compact('aspirante'));
    }
    public function cargar_notas(Request $request){
        //dd($request->all());
        for ($i=0; $i < count($request->id_estudiante); $i++) { 
            if ($request->nota[$i] != null) {
                $cargar_nota = model_nota::cargar_nota($request->nota[$i],$request->id_estudiante[$i],$request->id_curso[$i]);
            }
        }
        return view('notf.notf16');
    }
    public function consultar(){
        $aspirante = model_estudiante::consulta_nomina(2);
        return view('admin.students.consultar', compact('aspirante'));
    }

    public function estudiante_notas(){
        $id_estudiante = model_estudiante::id_estudiante(session('id'));
        //dd($id_estudiante[0]->id_estudiante);
        $aspirante = model_estudiante::lista_notas($id_estudiante[0]->id_estudiante);
        //dd($aspirante); //aqui quede
        return view('admin.students.estudiante_notas', compact('aspirante'));
    }

    public function certificacion($id_estudiante){
        //dd($id_estudiante);
        $aspirante = model_estudiante::estudiante_notas($id_estudiante);
        //dd($aspirante);
        return $aspirante;
    }
}
