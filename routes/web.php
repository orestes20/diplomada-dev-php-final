<?php

use App\Http\Controllers\aspiranteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAdminController;
use App\Http\Controllers\actualizarController
;
Route::get('/', fn() => view('public.home'));

//rutas para el inicio de procesos en laravel
Route::prefix('admin')->group(function() {
    Route::controller(userAdminController::class)->group(function(){
        Route::get('/', fn () => view('admin.home'));
        Route::get('/login', 'index');
        Route::post('login','login');
        Route::get('registro_diplomada','registro_diplomada');
        Route::post('registro','registro');
        Route::get('cerrar_sesion','logout');
        //comprobar si la cedula existe
        Route::get('val_cedula/{ced}','val_cedula');
        Route::get('val_correo/{correo}','val_correo');
        Route::get('view_recuperar_clave','view_recuperar_clave');
        Route::post('recuperar_clave','recuperar_clave');

        //usuarios analistas
        Route::prefix('usuarios')->group(function () {
            Route::get('/','lista_usuario');
            Route::get('form','view_nuevo_usuario');
            Route::post('crear_usuario','crear_usuario');
        });
        //rutas para asignar profesores a los cursos de extensión
        Route::get('asignar_profesores','asignar_profesores');
        Route::post('asignar','asignar');
    });
});

Route::prefix('aspirante')->group(function(){
    Route::controller(actualizarController::class)->group(function(){
        Route::get('hash/{data}','actualizar_hash');
    });
    Route::controller(aspiranteController::class)->group(function(){
        //ruta del estudiante
        Route::get('view_cargar_documentos','view_cargar_documentos');
        Route::post('guardar_documentos','guardar_documentos');
        Route::get('view_actualizar_insalirformacion','view_actualizar_informacion');
        Route::post('actualizar_usuario','actualizar_usuario');
        Route::get('estudiante_notas','estudiante_notas');

        //ruta para los analistas de sistema
        Route::get('revisar_documentos','revisar_documentos');
        Route::post('actualizar_estatus_documento','actualizar_estatus_documento');
        Route::get('aspirantes','lista_aspirantes');
        Route::get('estudiantes','lista_estudiantes');

        //rutas para los profesores 
        Route::get('nomina','nomina');
        Route::post('cargar_notas','cargar_notas');
        Route::get('consultar','consultar');

        //ruta para el proceso de inscripcion
        Route::get('inscripcion','view_inscripción');
        Route::post('guardar_inscripcion','guardar_inscripcion');
        Route::get('data_inscripcion','data_inscripcion');
    });
});