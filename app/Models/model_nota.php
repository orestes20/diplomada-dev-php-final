<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_nota extends Model
{
    use HasFactory;
    protected $table = 'notas';
    protected $primaryKey = 'id_notas';

    public static function cargar_nota($nota,$id_estudiante,$id_curso){
        $cargar = new model_nota();
        $cargar->id_estudiante = $id_estudiante;
        $cargar->id_curso = $id_curso;
        $cargar->notas = $nota;
        $cargar->save();
        return true;
    }
}
