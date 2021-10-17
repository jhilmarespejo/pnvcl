{{-- SHOW FORM TO CREATE A NEW PATIENT --}}
@extends('layouts.template')
@section('title', 'Datos del Paciente')



@section('content')


@foreach ($dp_records as $dp_record) 

@endforeach
{{-- {{ $dp_record->tipo_caso
 }} --}}
<div class="container-md" style="padding: 1% 3%;">
    <div class="text-center">
        <h3>Edición de datos de paciente</h3>
    </div>
    <fieldset class="field-border">
        <div class="row">
            <label><strong>Datos generales:</strong></label>
            <div class="col">    
                <label class="form-label-sm">SEDES</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $dp_record->sedes }}">
            </div>
            <div class="col">    
                <label data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $dp_record->serv_salud }}" class="form-label-sm">Servicio de salud</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $dp_record->serv_salud }}" >
            </div>
            <div class="col">    
                <label class="form-label-sm">Provincia</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $dp_record->provincia }}">
            </div>
            <div class="col">    
                <label class="form-label-sm">Municipio</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $dp_record->municipio }}">
            </div>
            <div class="col">    
                <label class="form-label-sm">Red de salud</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $dp_record->red_salud }}">
            </div>
        </div>
</fieldset>
                @isset ($active_tab)
                    {{ $active_tab }}                 
                @endisset
            

    <div class="d-flex align-items-start mt-3">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <span class="nav-link active" id="vtab_2" data-bs-toggle="pill" data-bs-target="#v-pills-datos-personales" type="button" role="tab" aria-controls="v-pills-datos-personales" aria-selected="true">2. Datos personales <br> y epidemiológicos</span>

            <span class="nav-link" id="vtab_3" data-bs-toggle="pill" data-bs-target="#v-pills-control-contactos" type="button" role="tab" aria-controls="v-pills-control-contactos" aria-selected="false">3. Control de contactos</span>

            <span class="nav-link" id="vtab_4" data-bs-toggle="pill" data-bs-target="#v-pills-datos-clinicos" type="button" role="tab" aria-controls="v-pills-datos-clinicos" aria-selected="false">4. Datos clínicos</span>

            <span class="nav-link" id="vtab_5" data-bs-toggle="pill" data-bs-target="#v-pills-bacteriologia" type="button" role="tab" aria-controls="v-pills-bacteriologia" aria-selected="false">5. Bacteriología</span>

            <span class="nav-link" id="vtab_6" data-bs-toggle="pill" data-bs-target="#v-pills-histopatologia" type="button" role="tab" aria-controls="v-pills-histopatologia" aria-selected="false">6. Histopatología</span>

            <span class="nav-link" id="vtab_7" data-bs-toggle="pill" data-bs-target="#v-pills-diagnostico" type="button" role="tab" aria-controls="v-pills-diagnostico" aria-selected="false">7. Diagnóstico clínico</span>

            <span class="nav-link" id="vtab_8" data-bs-toggle="pill" data-bs-target="#v-pills-discapacidades" type="button" role="tab" aria-controls="v-pills-discapacidades" aria-selected="false">8. Registro de discapacidades</span>

            <span class="nav-link" id="vtab_9" data-bs-toggle="pill" data-bs-target="#v-pills-tratamiento" type="button" role="tab" aria-controls="v-pills-tratamiento" aria-selected="false">9. Tratamiento</span>

            <span class="nav-link" id="vtab_10" data-bs-toggle="pill" data-bs-target="#v-pills-identificacion" type="button" role="tab" aria-controls="v-pills-identificacion" aria-selected="false">10. Identificación de caso</span>

            <span class="nav-link" id="vtab_11" data-bs-toggle="pill" data-bs-target="#v-pills-notificacion" type="button" role="tab" aria-controls="v-pills-notificacion" aria-selected="false">11. Servicio de salud que notifica</span>


        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="container-sm tab-pane fade show active" id="v-pills-datos-personales" role="tabpanel" aria-labelledby="vtab_2">
                @include('dpEdit.datosPersonales', compact(['dp_records', 'dp_addresses', 'healt_services', 'previous_residences']))
            </div>

            <div class="container-sm tab-pane fade" id="v-pills-control-contactos" role="tabpanel" aria-labelledby="vtab_3">
                 {{-- @include('dpEdit.controlContactos', ['id' => $id]) --}}
                 <a class="btn btn-primary btn-lg" href="/contactos/edit/{{$id}}">Control de contactos</a>
            </div>

            <div class="container-sm tab-pane fade" id="v-pills-datos-clinicos" role="tabpanel" aria-labelledby="vtab_4">
                @include('dpEdit.datosClinicos', compact('clinical_records'))
            </div>

            <div class="container-sm tab-pane fade" id="v-pills-bacteriologia" role="tabpanel" aria-labelledby="vtab_5">
                @include('dpEdit.bacteriologia', compact('bacteriology_records'))
            </div>

            <div class="container-sm tab-pane fade" id="v-pills-histopatologia" role="tabpanel" aria-labelledby="vtab_6">
                @include('dpEdit.histopatologia', compact('histopatology_records'))
            </div>

            <div class="container-sm tab-pane fade" id="v-pills-diagnostico" role="tabpanel" aria-labelledby="vtab_7">
                @include('dpEdit.diagnosticoClinico', compact('diagnostic_records'))
            </div>

            <div class="container-sm tab-pane fade" id="v-pills-discapacidades" role="tabpanel" aria-labelledby="vtab_8">
                @include('dpEdit.discapacidades', compact('disability_records'))
            </div>

            <div class="container-sm tab-pane fade" id="v-pills-tratamiento" role="tabpanel" aria-labelledby="vtab_9">
                @include('dpEdit.tratamiento', compact('treatment_records'))
            </div>

            <div class="container-sm tab-pane fade" id="v-pills-identificacion" role="tabpanel" aria-labelledby="vtab_10">
                @include('dpEdit.identificacion', compact('identification_records'))
            </div>

            <div class="container-sm tab-pane fade" id="v-pills-notificacion" role="tabpanel" aria-labelledby="vtab_11">
                @include('dpEdit.notificacion', compact('notification_records'))
            </div>
        </div>
    </div>
</div>




@endsection



