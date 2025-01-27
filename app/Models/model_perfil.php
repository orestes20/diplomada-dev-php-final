<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_perfil extends Model
{
    use HasFactory;
    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';

    public static function perfil(){
        $perfil= DB::table('perfil as per')->select('id_perfil','perfil')->where('id_perfil','=',1)->orWhere('id_perfil','>',3)->get();
        return $perfil;
    }
    
}
