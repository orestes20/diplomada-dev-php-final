<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estudiante',function($estudiante){
            $estudiante->increments('id_estudiante');
            $estudiante->string('nombre','80');
            $estudiante->string('apellido','80');
            $estudiante->string('cedula','20');
            $estudiante->string('sexo');
            $estudiante->date('fecha_nac');
            $estudiante->text('direccion')->nullable();
            $estudiante->string('telefono_habitacion','45')->nullable();
            $estudiante->string('telefono_otros','45')->nullable();
            $estudiante->string('celular','45')->nullable();
            $estudiante->string('correo','45')->nullable();
            $estudiante->string('realizo_cursos_anterior_iuac','2')->nullable();
            $estudiante->string('curso_anterior','200')->nullable();
            $estudiante->text('foto_carnet')->nullable();
            $estudiante->text('fotocopia_cedula')->nullable();
            $estudiante->text('curriculum')->nullable();
            $estudiante->text('constancia_idiomas')->nullable();
            $estudiante->text('partida_nacimiento_copia')->nullable();
            $estudiante->text('certificaciones_pregrado')->nullable();
            $estudiante->text('titulo_pregrado_copia')->nullable();
            $estudiante->text('notas_certificadas')->nullable();
            $estudiante->text('calificaciones_postgrado_copia')->nullable();
            $estudiante->text('titulo_postgrado')->nullable();
            $estudiante->text('propuesta_investigacion')->nullable();
            $estudiante->text('otros_titulos')->nullable();
            $estudiante->text('wallet')->nullable();
            $estudiante->string('estatus_documentos','3')->nullable();
            $estudiante->integer('id_estado_civil')->nullable();
            $estudiante->integer('id_nacionalidad')->nullable();
            $estudiante->integer('id_privado_libertad')->nullable();
            $estudiante->integer('id_datos_laborales')->nullable();
            $estudiante->integer('id_datos_academicos')->nullable();
            $estudiante->integer('id_condicion_residencial')->nullable();
            $estudiante->integer('id_usuario')->nullable();
            
            $estudiante->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
