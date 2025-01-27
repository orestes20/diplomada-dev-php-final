<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_curso_profesor extends Model
{
    use HasFactory;

    protected $table = 'curso_profesor';
    protected $primary_key = 'id';

    public static function asignar($data){
        //dd($data->all());
        $asignar = new model_curso_profesor();
        $asignar->id_profesor = $data->id_usuario;
        $asignar->id_curso = $data->asignar_curso;
        $asignar->save();
        return true;
    }
}
