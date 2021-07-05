{{-- SHOW FORM TO CREATE A NEW PATIENT --}}
@extends('layouts.template')
@section('title', 'Nuevo Paciente')



@section('content')

<h3 class="text-center">REGISTRO DE PACIENTE</h3>
    <div class="containet mb-4">
        <fieldset class="row entry field-border">
            <legend class="field-border">1. Datos generales</legend>
            <div class="col xs sm md">
                <label class="form-label">Sedes</label>
                <select class="form-select"  placeholder="" name="">
                    <option selected disabled>Seleccione...</option>
                    <option value="1">Beni</option>
                    <option value="2">Pando</option>
                    <option value="3">Santa Cruz</option>
                    <option value="1">Cochabamba</option>
                    <option value="2">Tarija</option>
                    <option value="3">Chuquisaca</option>
                    
                </select>
            </div>
            
            <div class="col xs sm md">
                <label class="form-label">Provincia</label>
                <input type="text" name="" id="" class="form-control">
            </div>
            
            <div class="col xs sm md">
                <label class="form-label">Municipio</label>
                <input type="text" name="" id="" class="form-control">
            </div>
            
            <div class="col xs sm md">
                <label class="form-label">Servicio de Salud</label>
                <input type="text" name="" id="" class="form-control">
            </div>
            
            <div class="col xs sm md">
                <label class="form-label">Red de Salud</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </fieldset>
    </div>
<form action="{{route('paciente.store')}}" method="POST" >
    @csrf
    
    @include('forms.datosPersonales')

    <div class="container row mb-2">
        <fieldset class="field-border row ">
                <legend class="col field-border col ">3. Control de contactos</legend>
                <button type="button" class="col btn btn-primary " data-bs-toggle="modal" data-bs-target="#controlContactos" data-bs-whatever="@mdo">Agregar datos de contactos</button>
        </fieldset>
    </div>
    {{-- BEGIN DATOS CLINICOS --}}
    <div class="container row">
        <fieldset class="field-border row">
            <legend class="field-border">4. Datos clínicos</legend>
            <div>
                <label class="form-label" > <br> Inicio de signos y/o síntomas año</label>
                <input type="number" name="datos_clinicos[inicio_sintomas]" min="2010" max="2021" value="{{old('datos_clinicos.inicio_sintomas')}}" id="" class="form-control" placeholder="Inicio de signos y/o síntomas año" data-bs-toggle="tooltip" data-bs-placement="top" title="Inicio de signos y/o síntomas año">
                @error('datos_clinicos.inicio_sintomas')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">
                <label class="form-label" >Tiempo de evolución en años o meses</label>
                <input type="number" name="datos_clinicos[tiempo_evolucion_cantidad]" min="0" max="100" value="{{old('datos_clinicos.tiempo_evolucion_cantidad')}}" id="" class="form-control" placeholder="Tiempo de evolución en años o meses" data-bs-toggle="tooltip" data-bs-placement="top" title="Tiempo de evolución en años o meses">
                @error('datos_clinicos.tiempo_evolucion_cantidad')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">
                <label class="form-label" ><br><br><br></label>
                <select name="datos_clinicos[tiempo_evolucion_unidad]" data-bs-toggle="tooltip" data-bs-placement="top" title="Años o Meses" class="form-select">
                    <option disabled {{ (old('datos_clinicos.tiempo_evolucion_unidad') == '')? 'selected':'' }} >Seleccione...</option>
                    <option value="Meses" {{ (old('datos_clinicos.tiempo_evolucion_unidad') == 'Meses')? 'selected':'' }} >Meses</option>
                    <option value="Años" {{ (old('datos_clinicos.tiempo_evolucion_unidad') == 'Años')? 'selected':'' }} >Años</option>
                </select>
                @error('datos_clinicos.tiempo_evolucion_unidad')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="row mt-4">
                <div class="col">
                    <label class="form-label" >Descripción de los primeros signos y/o síntomas</label>
                    <textarea class="form-control" name="datos_clinicos[descripcion_primeros_signos]" id="" class="form-control" placeholder="Descripción de los primeros signos" data-bs-toggle="tooltip" data-bs-placement="top" title="Descripción de los primeros signos">{{old('datos_clinicos.descripcion_primeros_signos')}}</textarea>
                    @error('datos_clinicos.descripcion_primeros_signos')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <label class="form-label" >Cuadro clínico actual (exploración general, signos y/o síntomas específicos y características de lesiones) </label>
                    <textarea class="form-control" name="datos_clinicos[cuadro_clinico_actual]" id="" class="form-control" placeholder="Cuadro clínico actual (exploración general, signos y/o síntomas específicos y características de lesiones" data-bs-toggle="tooltip" data-bs-placement="top" title="Cuadro clínico actual (exploración general, signos y/o síntomas específicos y características de lesiones">{{old('datos_clinicos.cuadro_clinico_actual')}}</textarea>
                    @error('datos_clinicos.cuadro_clinico_actual')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
            </div>
        </fieldset>
    </div>
    {{-- BACTERIOLOGIA --}}
    <div class="container row mt-3">
        <fieldset class="field-border row">
            <legend class="field-border">5. Bacteriología</legend>
            <div class="row">
                <div class="col">
                    <label class="form-label" >Fecha de toma de muestra</label>
                    <input type="date" name="bacteriologia[fecha_muestra]" value="{{old('bacteriologia.fecha_muestra')}}" id="" class="form-control" placeholder="Fecha de toma de muestra" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de toma de muestra">
                    @error('bacteriologia.fecha_muestra')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" >Laboratorio </label>
                    <input type="text" name="bacteriologia[laboratorio]" value="{{old('bacteriologia.laboratorio')}}" id="" class="form-control" placeholder="Laboratorio" data-bs-toggle="tooltip" data-bs-placement="top" title="Laboratorio">
                    @error('bacteriologia.laboratorio')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row"></div>
            <div class="row mt-3">
                <div class="col">
                    <label class="form-label" >Linfa obtenida de:</label>
                </div>
                <div class="col">
                    <select class="form-select col" name="bacteriologia[linfa]" data-bs-toggle="tooltip" data-bs-placement="top" title="Linfa obtenida de" class="form-select">
                        <option disabled {{(old('bacteriologia.linfa') == '')? 'selected':'' }}>Seleccione...</option>
                        <option value="Lobulo de la oreja" {{(old('bacteriologia.linfa') == 'Lobulo de la oreja')? 'selected':'' }}>Lóbulo de la oreja</option>
                        <option value="Lesion" {{(old('bacteriologia.linfa') == 'Lesion')? 'selected':'' }}>Lesión</option>
                        <option value="Codo" {{(old('bacteriologia.linfa') == 'Meses')? 'selected':'' }}>Codo</option>
                    </select>
                    @error('bacteriologia.linfa')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3 mt-3"><label for=""><strong>Resultado laboratorial:</strong></label></div>
            <div class="col">
                <label class="form-label" >Fecha de resultado</label>
                <input type="date" name="bacteriologia[fecha_resultado]" value="{{old('bacteriologia.fecha_resultado')}}" id="" class="form-control" placeholder="Fecha de resultado" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de resultado">
                @error('bacteriologia.fecha_resultado')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">
                <label class="form-label" >Lóbulo de la oreja</label>
                <select class="form-select" name="bacteriologia[resultado_lobulo_oreja]" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado: lóbulo de la oreja" class="form-select">
                    <option disabled {{(old('bacteriologia.resultado_lobulo_oreja') == '')? 'selected':'' }}>Seleccione...</option>
                    <option value="Positivo" {{(old('bacteriologia.resultado_lobulo_oreja') == 'Positivo')? 'selected':'' }}>Positivo</option>
                    <option value="Negativo" {{(old('bacteriologia.resultado_lobulo_oreja') == 'Negativo')? 'selected':'' }}>Negativo</option>
                </select>
                @error('bacteriologia.resultado_lobulo_oreja')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="row mt-2"></div>
            <div class="col">
                <label class="form-label" >Lessión</label>
                <select class="form-select" name="bacteriologia[resultado_lesion]" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado: Lessión" class="form-select">
                    <option disabled {{(old('bacteriologia.resultado_lesion') == '')? 'selected':'' }}>Seleccione...</option>
                    <option value="Positivo" {{(old('bacteriologia.resultado_lesion') == 'Positivo')? 'selected':'' }}>Positivo</option>
                    <option value="Negativo" {{(old('bacteriologia.resultado_lesion') == 'Negativo')? 'selected':'' }}>Negativo</option>
                </select>
                @error('bacteriologia.resultado_lesion')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">
                <label class="form-label" >Codo</label>
                <select class="form-select" name="bacteriologia[resultado_codo]" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado: Codo" class="form-select">
                    <option disabled {{(old('bacteriologia.resultado_codo') == '')? 'selected':'' }}>Seleccione...</option>
                    <option value="Positivo" {{(old('bacteriologia.resultado_codo') == 'Positivo')? 'selected':'' }}>Positivo</option>
                    <option value="Negativo" {{(old('bacteriologia.resultado_codo') == 'Negativo')? 'selected':'' }}>Negativo</option>
                </select>
                @error('bacteriologia.resultado_codo')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>

        </fieldset>
        <fieldset class="field-border row mt-3">
            <legend class="field-border mb-3">6. Histopatolog&iacute;a (si corresponde o es necesario)</legend>
            <div class="col">
                {{-- <input type="text" name="" id="" class="form-control" placeholder="Laboratorio que realiza el informe"> --}}

                <textarea class="form-control" name="histopatologia[laboratorio_informe]" id="" class="form-control" placeholder="Laboratorio que realiza el informe" data-bs-toggle="tooltip" data-bs-placement="top" title="Laboratorio que realiza el informe">{{old('histopatologia.laboratorio_informe')}}</textarea>
                @error('histopatologia.laboratorio_informe')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror

            </div>
            <div class="col">
                {{-- <input type="text" name="" id="" class="form-control" placeholder=""> --}}

                <textarea class="form-control" name="histopatologia[resultado_histopatologico]" id="" class="form-control" placeholder="Resultado histopatológico" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado histopatológico">{{old('histopatologia.resultado_histopatologico')}}</textarea>
                @error('histopatologia.resultado_histopatologico')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
        </fieldset>
    </div>

    {{-- DIAGNÓSTICO CLINICO --}}
    @include('forms.diagnosticoClinico')
    {{-- REGISTRO DE DISCAPACIDADES --}}
    <div class="container row mt-2">
        <fieldset class="field-border row ">
                <legend class="col field-border col ">8. Registro de discapacidades</legend>
                <button type="button" class="col btn btn-primary " data-bs-toggle="modal" data-bs-target="#discapacidades" data-bs-whatever="@mdo">Agregar registros</button>
        </fieldset>
         {{-- BEGIN modal DISCAPACIDADes form--}}
            <div class="modal fade" id="discapacidades" tabindex="-1" aria-labelledby="discapacidadLabel" aria-hidden="true">
                @include('forms.discapacidades');
            </div>
        {{-- END MODAL --}}
    </div>
    {{-- TRATAMIENTO --}}
    <div class="container row mt-2">
        <fieldset class="field-border row ">
            <legend class="col field-border col ">9. Tratamiento</legend>
            @include('forms.tratamiento');
        </fieldset>

    </div>

    
    {{-- BEGIN modal CONTROL DE CONTACTOS form--}}
        <div class="modal fade" id="controlContactos" tabindex="-1" aria-labelledby="controlContactosLabel" aria-hidden="true">
            @include('forms.controlContactos');
        </div>
    {{-- END MODAL --}}

    {{-- BEGIN modal RESIDENCIA ANTERIOR--}}
    <div class="modal fade" id="residenciaanterior" tabindex="-1" aria-labelledby="controlContactosLabel" aria-hidden="true">
        @include('forms.residenciaAnterior');
    </div>
    {{-- END MODAL --}}
    <button type="submit" class="btn btn-success btn-lg"  >Enviar</button>
</form>
<script type="text/javaScript">
    $( document ).ready(function() {
       
   
  });
</script>

@endsection



