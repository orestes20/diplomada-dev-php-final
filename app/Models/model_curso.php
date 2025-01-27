<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class model_curso extends Model
{
    use HasFactory;
    protected $table = 'curso';
    protected $primary_key = 'id';

    public static function cursos(){
        $cursos = model_curso::all();
        return $cursos;
    }
    public static function consulta_asignar(){
        $cursos = DB::table('curso as cu')->select('cu.id_curso','curso')->leftjoin('curso_profesor as cu_f','cu_f.id_curso','=','cu.id_curso')->whereNull('cu_f.id_curso')->get();
        return $cursos;
    }
}
