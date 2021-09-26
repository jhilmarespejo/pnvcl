<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    
    public function edit(notificacion $notificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notificacion $notificacion)
    {
        //return $request;
        Notificacion::where('identificacion_caso_id', '=', $request['notificacion']['identificacion_caso_id'])->update($request['notificacion']);
        return redirect("paciente/edit/".$request['datos_personales_id'])->with(['success' => '!Dato actualizado con éxito¡']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(notificacion $notificacion)
    {
        //
    }
}
