{{-- SHOW FORM TO CREATE A NEW PATIENT --}}
@extends('layouts.template')
@section('title', 'Nuevo Paciente')



@section('content')

<h3 class="text-center">REGISTRO DE PACIENTE</h3>
    <div class="container-xxl mb-4 animate fadeInRight">
        <fieldset class="row entry field-border">
            <legend class="field-border">1. Datos generales (Lugar de detección del caso)</legend>
            <div class="col xs sm md">
                <label class="form-label">Sedes</label>
                <select class="form-select" id="sedes" name="sedes">
                    <option selected disabled>Seleccione...</option>
                    <option value="1">Pando</option>
                    <option value="2">Beni</option>
                    <option value="3">Santa Cruz</option>
                    <option value="4">Cochabamba</option>
                    <option value="6">Tarija</option>
                    <option value="5">Chuquisaca</option>
                    <option value="9">La Paz</option>
                    <option value="8">Oruro</option>
                    <option value="7">Potosí</option>
                </select>
            </div>
            
            <div class="col xs sm md">
                <label class="form-label">Provincia</label>
                <div class="provincias"></div>
            </div>
            
            <div class="col xs sm md">
                <label class="form-label">Municipio</label>
                <div class="municipios"></div>
            </div>
            
            <div class="col xs sm md">
                <label class="form-label">Servicio de Salud</label>
                <div class="serv_salud"></div>
            </div>
            
            <div class="col xs sm md">
                <label class="form-label">Red de Salud</label>
                <div class="red_salud"></div>
            </div>
        </fieldset>
        <div id="resp">
        
        </div>
    </div>

    {{-- {{ $errors  }} --}}
<form {{-- autocomplete="off" --}} action="{{route('paciente.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('datosPersonales.datosPersonales')

    {{-- 4. BEGIN DATOS CLINICOS --}}
    <div class="container-xxl">
        <fieldset class="field-border row">
            <legend class="field-border">4. Datos clínicos</legend>
            <div class="col">
                <div class="col">
                    <input type="number" name="datos_clinicos[inicio_sintomas]" min="2010" max="2030" value="{{old('datos_clinicos.inicio_sintomas')}}" id="" class="form-control" placeholder="Inicio de signos y/o síntomas año" data-bs-toggle="tooltip" data-bs-placement="top" title="Inicio de signos y/o síntomas año">
                    @error('datos_clinicos.inicio_sintomas')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
                <div class="col mt-2">
                    <input type="number" name="datos_clinicos[tiempo_evolucion_cantidad]" min="0" max="100" value="{{old('datos_clinicos.tiempo_evolucion_cantidad')}}" id="" class="form-control" placeholder="Tiempo de evolución en años o meses" data-bs-toggle="tooltip" data-bs-placement="top" title="Tiempo de evolución en años o meses">
                    @error('datos_clinicos.tiempo_evolucion_cantidad')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
                <div class="col mt-2">
                    <select name="datos_clinicos[tiempo_evolucion_unidad]" data-bs-toggle="tooltip" data-bs-placement="top" title="Años o Meses" class="form-select">
                        <option disabled {{ (old('datos_clinicos.tiempo_evolucion_unidad') == '')? 'selected':'' }} >Seleccione...</option>
                        <option value="Meses" {{ (old('datos_clinicos.tiempo_evolucion_unidad') == 'Meses')? 'selected':'' }} >Meses</option>
                        <option value="Años" {{ (old('datos_clinicos.tiempo_evolucion_unidad') == 'Años')? 'selected':'' }} >Años</option>
                    </select>
                    @error('datos_clinicos.tiempo_evolucion_unidad')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="col">
                    <textarea rows="1" class="form-control" name="datos_clinicos[descripcion_primeros_signos]" id="" class="form-control" placeholder="Descripción de los primeros signos" data-bs-toggle="tooltip" data-bs-placement="top" title="Descripción de los primeros signos">{{old('datos_clinicos.descripcion_primeros_signos')}}</textarea>
                    @error('datos_clinicos.descripcion_primeros_signos')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
                <div class="col mt-2">
                    <textarea rows="1" class="form-control" name="datos_clinicos[cuadro_clinico_actual]" id="" class="form-control" placeholder="Cuadro clínico actual (exploración general, signos y/o síntomas específicos y características de lesiones" data-bs-toggle="tooltip" data-bs-placement="top" title="Cuadro clínico actual (exploración general, signos y/o síntomas específicos y características de lesiones">{{old('datos_clinicos.cuadro_clinico_actual')}}</textarea>
                    @error('datos_clinicos.cuadro_clinico_actual')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
            </div>
     
        </fieldset>
    </div>
    {{--5. BACTERIOLOGIA --}}
    <div class="container-xxl mt-3">
        <fieldset class="field-border row">

            @include('datosPersonales.bacteriologia')
            
            <fieldset class="field-borde col">
                <legend class="field-border">6. Histopatolog&iacute;a (si corresponde o es necesario)</legend>
                <div class="col">
                    <textarea rows="2" class="form-control" name="histopatologia[laboratorio_informe]" id="" class="form-control" placeholder="Laboratorio que realiza el informe" data-bs-toggle="tooltip" data-bs-placement="top" title="Laboratorio que realiza el informe">{{old('histopatologia.laboratorio_informe')}}</textarea>
                    @error('histopatologia.laboratorio_informe')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror

                </div>
                <br>
                <div class="col">
                    <textarea rows="2" class="form-control" name="histopatologia[resultado_histopatologico]" id="" class="form-control" placeholder="Resultado histopatológico" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado histopatológico">{{old('histopatologia.resultado_histopatologico')}}</textarea>
                    @error('histopatologia.resultado_histopatologico')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
            </fieldset>
        </fieldset>
    </div>

    {{-- DIAGNÓSTICO CLINICO --}}
    @include('datosPersonales.diagnosticoClinico')
    {{-- REGISTRO DE DISCAPACIDADES --}}
    <div class="container-xxl mt-2">
        <fieldset class="field-border row ">
                <legend class="col field-border col ">8. Registro de discapacidades</legend>
                <button type="button" class="col btn btn-primary " data-bs-toggle="modal" data-bs-target="#discapacidades" data-bs-whatever="@mdo">Agregar registros</button>
                <small id="" class="fs-8 text-danger msg-discapacidad" style="display:none"> * Datos de discapacidad incompletos</small>

        </fieldset>
         {{-- BEGIN modal DISCAPACIDADes form--}}
            <div class="modal fade" id="discapacidades" tabindex="-1" aria-labelledby="discapacidadLabel" aria-hidden="true">
                @include('datosPersonales.discapacidades');
            </div>
        {{-- END MODAL --}}
    </div>
    {{-- TRATAMIENTO --}}
    <div class="container-xxl mt-2">
        <fieldset class="field-border row ">
            <legend class="field-border ">9. Tratamiento</legend>
            @include('datosPersonales.tratamiento');
        </fieldset>

    </div>

    
    {{-- BEGIN modal CONTROL DE CONTACTOS form--}}
        <div class="modal fade" id="controlContactos" tabindex="-1" aria-labelledby="controlContactosLabel" aria-hidden="true">
            @include('datosPersonales.controlContactos');
        </div>
    {{-- END MODAL --}}

    {{-- BEGIN modal RESIDENCIA ANTERIOR--}}
    <div class="modal fade" id="residenciaanterior" tabindex="-1" aria-labelledby="controlContactosLabel" aria-hidden="true">
        @include('datosPersonales.residenciaAnterior');
    </div>
    {{-- END MODAL --}}

    <div class="container-xxl mt-2">
        <fieldset class="row field-border">
            <fieldset class="field-border col">
                <legend class="field-border ">10. Identificación de caso</legend>
                <div class="row">
                    <label class="col">10.1 Vigilacia activa</label>
                    <select name="identificacion_caso[activa]" class="form-select col" id="activa" >
                        <option value="" {{(old('identificacion_caso.activa') == '')? 'selected':'' }}>Seleccione</option>
                        <option value="Casa por casa" {{(old('identificacion_caso.activa') == 'Casa por casa')? 'selected':'' }}>Casa por casa</option>
                        <option value="Campaña" {{(old('identificacion_caso.activa') == 'Campaña')? 'selected':'' }}>Campaña</option>
                    </select>
                    @error('identificacion_caso.activa')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
                <div class="row">
                    <label class="col">10.2 Vigilacia Pasiva</label>
                    <input type="hidden" name="identificacion_caso[pasiva]" value="">
                    <input class="form-check-input" id="pasiva" type="checkbox" name="identificacion_caso[pasiva]" value="En servicio de salud" {{(old('identificacion_caso.pasiva') == 'En servicio de salud')? 'checked':'' }}>
                    <label class="form-check-label col">En servicio de salud</label>
                    @error('identificacion_caso.pasiva')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
                <div class="row">
                    <label class="col">10.3 Transferencia</label>
                    <input type="hidden" name="identificacion_caso[transferencia]" value="">
                    <input class="form-check-input" id="transferencia" type="checkbox" name="identificacion_caso[transferencia]" value="Referido" {{(old('identificacion_caso.transferencia') == 'Referido')? 'checked':'' }}>
                    <label class="form-check-label col">Referido</label>
                    @error('identificacion_caso.transferencia')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
            </fieldset>
            <fieldset class="field-border col">
                <legend class="field-border ">11. Servicio de salud que notifica</legend>
                <div class="row">
                    <div class="col">
                        {{-- <label class="col">Servicio de salud que notifica</label> --}}
                        <input type="text" name="notificacion[servicio_salud]" class="col form-control" id="servicio_salud_notifica" placeholder="Servicio de salud que notifica" data-bs-toggle="tooltip" data-bs-placement="top" title="Servicio de salud que notifica" value="{{old('notificacion.servicio_salud')}}">
                        @error('notificacion.servicio_salud')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                        
                    <div class="col">
                        {{-- <label class="col">Fecha de notificación</label> --}}
                        <input type="date" name="notificacion[fecha]" class="col form-control" value="{{old('notificacion.fecha')}}" placeholder="Fecha de notificación" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de notificación">
                        @error('notificacion.fecha')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col mt-2">
                        {{-- <label class="col">Servicio de salud que notifica</label> --}}
                    <input type="text" name="notificacion[notificador]" class="col form-control" id="servicio_salud_notifica" placeholder="Nombre del profesional que notifica" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombre del profesional que notifica"  value="{{old('notificacion.notificador')}}">
                    @error('notificacion.notificador')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
                
            </fieldset>
        </fieldset>

    </div>

    <button type="submit" class="btn btn-success btn-lg"  >Enviar</button>
</form>



<script type="text/javaScript">
$( document ).ready(function() {
    $('#sedes').change(function (params) {
        doAjax(
          {'sedes_id':$(this).val(), 'q':'provincias', 'new_tag':'provincias'},
          function() { },
          function (response) { 
            $("#provincias, #municipios, #servs_salud, #redes_salud").remove(); 
            $('#datos_personales_servicio_salud_id').val('');
            $('.provincias').html(response);}, 
          function(){alert("error")}
        );
    });

    // $('#activa').change(function () { //     identification( $(this) ) // });
    document.getElementById('activa').onload = identification( $('#activa') );
    document.getElementById('activa').addEventListener("change", function() {identification( $('#activa') );});

    function identification(tag){
        if( tag.val() == ''){
            $('#pasiva, #transferencia').removeAttr('disabled');
        } else{
            $('#pasiva, #transferencia').prop("disabled", true);
            $('#pasiva, #transferencia').prop('checked',false)
        }
    }
    $('#pasiva').click(function (e) {
            $('#transferencia').prop('checked',false);
    });
    $('#transferencia').click(function (e) {
            $('#pasiva').prop('checked',false);
    });
    
});
 

          
</script>

@endsection



