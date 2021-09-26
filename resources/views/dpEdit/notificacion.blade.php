@foreach ($notification_records as $notificacion)
    @endforeach
<form method="POST" action="{{ route('notificacion.update') }}" >
@csrf
@method('put')

    <fieldset class="field-border row">
        <legend class="field-border ">11. Servicio de salud que notifica</legend>
        <div class="row">
            <div class="col">
                {{-- <label class="col">Servicio de salud que notifica</label> --}}
                <input type="hidden" name="datos_personales_id" value="{{$notificacion->datos_personales_id}}">
                <input type="hidden" name="notificacion[identificacion_caso_id]" value="{{$notificacion->identificacion_caso_id}}">
                <input type="text" name="notificacion[servicio_salud]" class="col form-control" id="servicio_salud_notifica" placeholder="Servicio de salud que notifica" data-bs-toggle="tooltip" data-bs-placement="top" title="Servicio de salud que notifica" value="{{$notificacion->servicio_salud}}">
                @error('notificacion.servicio_salud')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>

            <div class="col">
                {{-- <label class="col">Fecha de notificación</label> --}}
                <input type="date" name="notificacion[fecha]" class="col form-control" value="{{$notificacion->fecha}}" placeholder="Fecha de notificación" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de notificación">
                @error('notificacion.fecha')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col mt-2">
            {{-- <label class="col">Servicio de salud que notifica</label> --}}
            <input type="text" name="notificacion[notificador]" class="col form-control" id="servicio_salud_notifica" placeholder="Nombre del profesional que notifica" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombre del profesional que notifica"  value="{{$notificacion->notificador}}">
            @error('notificacion.notificador')
            <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>

    </fieldset>
     <div class="text-center mt-4">
        <button type="submit" class="btn btn-success btn-lg">Actualizar Datos de Notificación de caso </button>
    </div>
</form>