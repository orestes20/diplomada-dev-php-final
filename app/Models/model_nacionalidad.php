<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_nacionalidad extends Model
{
    use HasFactory;
    protected $table = 'nacionalidad';
    protected $primary_key = 'id_nacionalidad';
    
    public static function nacionalidad(){
        $nacionalidad = model_nacionalidad::all();
        return $nacionalidad;
    }
}
