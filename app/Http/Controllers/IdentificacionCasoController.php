<?php

namespace App\Http\Controllers;

use App\Models\IdentificacionCaso;
use Illuminate\Http\Request;

class IdentificacionCasoController extends Controller
{

    public function update(Request $request, IdentificacionCaso $identificacion_caso)
    {
        IdentificacionCaso::where('datos_personales_id', '=', $request['identificacion_caso']['datos_personales_id'])->update($request['identificacion_caso']);
        return redirect("paciente/edit/".$request['identificacion_caso']['datos_personales_id'])->with(['success' => '!Dato actualizado con éxito¡']);
    }

    
}
