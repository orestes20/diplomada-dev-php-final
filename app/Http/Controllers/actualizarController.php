<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_estudiante;
class actualizarController extends Controller
{
    public function actualizar_hash($data){
        $actualizar = model_estudiante::hash_estudiante($data);
        return $actualizar;
    }
}
