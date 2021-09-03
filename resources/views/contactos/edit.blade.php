{{-- FORM WHERE THE DATA OF A PATIENT'S CONTACTS ARE RECORDED --}}
@extends('layouts.template')
@section('title', 'Contactos')

{{-- @php
    print_r($records);
@endphp --}}

@section('content')

{{-- <div class="error-label">This field is required.</div> --}}

<div class="position-relative">
    @if(Session::has('success'))
        <div class="col-3 alert alert-success alert-dismissible notification" role="alert">
            <strong>{{Session::get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('warning'))
        <div class="col-3 alert alert-warning alert-dismissible notification" role="alert">
            <strong>{{Session::get('warning') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<h3 class="text-center">FORMULARIO DE CONTROL DE CONTACTOS</h3>
<div class="container" >
@foreach ($patientRecords as $patientRecord) @endforeach

    <fieldset class="field-border">
        <div class="row">
            <label><strong>Datos generales:</strong></label>
            <div class="col">    
                <label class="form-label-sm">SEDES</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->sedes }}">
            </div>
            <div class="col">    
                <label data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $patientRecord->serv_salud }}" class="form-label-sm">Servicio de salud</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->serv_salud }}" >
            </div>
            <div class="col">    
                <label class="form-label-sm">Provincia</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->provincia }}">
            </div>
            <div class="col">    
                <label class="form-label-sm">Municipio</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->municipio }}">
            </div>
            <div class="col">    
                <label class="form-label-sm">Red de salud</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->red_salud }}">
            </div>
        </div>
        <div class="row">
            <label><strong>Datos del paciente:</strong></label>
           <div class="col">    
                <label class="form-label-sm">Nombres y Apellidos</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->nombres.' '.$patientRecord->apellidos }}">
            </div>
            <div class="col">    
                <label class="form-label-sm">Historia clínica</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->historia_clinica }}">
            </div>
            <div class="col">    
                <label class="form-label-sm">Ficha Nº</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->num_ficha }}">
            </div>
            <div class="col">    
                <label class="form-label-sm">Diagnóstico</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->diagnostico}}">
            </div>
            <div class="col">    
                <label class="form-label-sm">Tratamiento</label>
                <input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->esquema_actual}}">
            </div>
            <div class="col-sm">
                <a class="btn btn-success mt-3 " href="/seguimiento/edit/{{$patientRecord->id}}">Seguimiento</a>
            </div>
            
        </div>
    </fieldset>
    
</div>

<h4 class="text-center">REGISTRO DE CONTACTOS</h4>
    
<div class="table-responsive">
    <table class="table table-responsive-xl table-hover contacts" >
        {{-- <caption>table title and/or explanatory text</caption> --}}
        <thead style="font-size:13px">
            <tr > 
                {{-- <th>#</th> --}}
                <th class="align-middle" >&nbsp;&nbsp;Nombres&nbsp;&nbsp;</th>
                <th class="align-middle" >&nbsp;Apellidos&nbsp;</th>
                <th class="align-middle" >Edad</th>
                <th class="align-middle" >Sexo</th>
                <th class="align-middle" >Parentesco</th>
                <th class="align-middle" >Conviviente <br> desde que año</th>
                <th class="align-middle " >Fecha de <br>control</th>
                <th class="align-middle" >Sintomático de piel</th>
                <th class="align-middle" >Laboratorio BAAR</th>
                <th class="align-middle" >Antecedente de lepra</th>
                <th class="align-middle" >Fecha de diagnóstico</th>
                <th class="align-middle" >Diagnóstico</th>
                <th class="align-middle" >Observaciones</th>
                <th class="align-middle" >Acciones</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
          <form method="post" action="{{ route('contactos.update') }}" >
            @csrf
            @method('put')
            <tr>
                {{-- <td></td> --}}
                <td>
                    <input type="hidden" name="id" value="{{ $contact->id }}">
                    <input type="hidden" name="datos_personales_id" value="{{ $contact->datos_personales_id }}">
                    <input type="text" name="contacto_nombres" class="form-control" value="{{ $contact->contacto_nombres }}">

                </td>
                <td><input type="text" name="contacto_apellidos" class="form-control" value="{{ $contact->contacto_apellidos }}"></td>
                <td><input type="number" min="0" max="150" name="contacto_edad" class="form-control" value="{{ $contact->contacto_edad }}"></td>
                <td>
                    <select  class="form-select" name="contacto_sexo" >
                        <option disabled value="" {{ ($contact->contacto_sexo == '')? 'selected' : '' }}>Seleccione...</option>
                        <option value="Fem" {{ ($contact->contacto_sexo == 'Fem')? 'selected' : '' }}>Fem</option>
                        <option value="Masc" {{ ($contact->contacto_sexo == 'Masc')? 'selected' : '' }}>Masc</option>
                    </select>
                </td>
                <td>  
                    <select class="form-select" name="contacto_parentesco">
                      <option disabled {{ ($contact->contacto_parentesco == '')? 'selected':'' }}>Seleccione...</option>
                      <option value="Pariente" {{ ($contact->contacto_parentesco == 'Pariente')? 'selected':'' }}>Pariente</option>
                      <option value="Vecino" {{ ($contact->contacto_parentesco == 'Vecino')? 'selected':'' }}>Vecino</option>
                      <option value="Otro" {{ ($contact->contacto_parentesco == 'Otro')? 'selected':'' }}>Otro</option>
                    </select>
                </td>
                <td>
                    <input type="number" min='1950' max="2030" class="form-control" name="conviviente" value="{{ $contact->conviviente }}">
                </td>
                <td>
                    <input type="date" min="2010" max="2030" class="form-control" name="fecha_control" value="{{ $contact->fecha_control }}">
                </td>
                <td>
                     <select  class="form-select" name="sintomatico_piel" >
                        <option disabled value="" {{ ($contact->sintomatico_piel == '')? 'selected' : '' }}>Seleccione...</option>
                        <option value="Si" {{ ($contact->sintomatico_piel == 'Si')? 'selected' : '' }}>Si</option>
                        <option value="No" {{ ($contact->sintomatico_piel == 'No')? 'selected' : '' }}>No</option>
                    </select>
                </td>

                <td>
                    <select  class="form-select"  name="laboratorio_baar" >
                        <option disabled value="" {{ ($contact->laboratorio_baar == '')? 'selected' : '' }}>Seleccione...</option>
                        <option style="" value="-" {{ ($contact->laboratorio_baar == '-')? 'selected' : '' }}>-</option>
                        <option style="" value="+" {{ ($contact->laboratorio_baar == '+')? 'selected' : '' }}>+</option>
                        <option style="" value="+" {{ ($contact->laboratorio_baar == '++')? 'selected' : '' }}>++</option>
                        <option style="" value="+" {{ ($contact->laboratorio_baar == '+++')? 'selected' : '' }}>+++</option>
                    </select>
                </td>
                <td>
                    <select  class="form-select"  name="antecedente_lepra" >
                        <option disabled value="" {{ ($contact->antecedente_lepra == '')? 'selected' : '' }}>Seleccione...</option>
                        <option value="Si" {{ ($contact->antecedente_lepra == 'Si')? 'selected' : '' }}>Si</option>
                        <option value="No" {{ ($contact->antecedente_lepra == 'No')? 'selected' : '' }}>No</option>
                        
                    </select>
                </td>
                <td>
                    <input type="date" name="contacto_fecha_diagnostico" class="form-control" value="{{ $contact->contacto_fecha_diagnostico }}"></td>
                </td>
                <td><input type="text" name="contacto_diagnostico" class="form-control" value="{{ $contact->contacto_diagnostico }}"></td>
                <td><input type="text" name="observaciones" class="form-control" value="{{ $contact->observaciones }}"></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Opciones
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          {{-- <li><a class="dropdown-item" href="">Guardar dato</a> --}}
                            <li >
                                <button class="dropdown-item"  type="submit">Guardar dato</button>
                            </li>
                            <li>
                                <span class="dropdown-item"> 
                                <span class="destroy-{{ $contact->id }}" id="destroy" >Eliminar</span>
                                </span>
                            </li>
                          {{--  --}}
                        </ul>
                      </div>
                </td>

            </tr>
           </form>
        <form action="{{ route('contactos.destroy') }}" method="post" id="destroy-{{ $contact->id }}"
        onsubmit="return confirm('¿Está seguro de eliminar éste registro?')">
            @csrf
            {{-- {{ method_field('delete') }} --}}
            @method('delete')
            <input type="hidden" name="id" value="{{ $contact->id }}">
            <input type="hidden" name="datos_personales_id" value="{{ $contact->datos_personales_id }}">
            {{-- <a class="dropdown-item" href="">Eliminar</a> --}}
            {{-- <button class="dropdown-item" type="submit">Eliminar</button> --}}
        </form>

        @endforeach
        <form method="post" action="{{ route('contactos.store') }}" >
            @csrf
            {{-- {{ $errors }} --}}
            <tr>
                {{-- <td></td> --}}
                <td>
                    
                    @isset ($contact->datos_personales_id)
                        <input type="hidden" name="datos_personales_id" value="{{$contact->datos_personales_id}}">
                    @endisset
                    @isset ($datos_personales_id)
                        <input type="hidden" name="datos_personales_id" value="{{$datos_personales_id}}">
                    @endisset

                    <input type="text" name="contacto_nombres" class="form-control form-control-sm" value="">
                    @error('contacto_nombres')
                       <small class="text-danger"> * {{$message}}</small>
                    @enderror

                </td>
                <td>
                    <input type="text" name="contacto_apellidos" class="form-control form-control-sm" value="">
                    @error('contacto_apellidos')
                    <small class="text-danger"> * {{$message}}</small>
                    @enderror
                </td>
                <td>
                    <input type="number" min="0" max="150"  name="contacto_edad" class="form-control form-control-sm" value="">
                    @error('contacto_edad')
                    <small class="text-danger"> * {{$message}}</small>
                    @enderror
                </td>
                <td>
                    <select  class="form-select form-select-sm" name="contacto_sexo" >
                        <option disabled selected="">Seleccione...</option>
                        <option value="Fem">Fem</option>
                        <option value="Masc">Masc</option>
                    </select>
                    @error('contacto_sexo')
                    <small class="text-danger"> * {{$message}}</small>
                    @enderror
                </td>
                <td>  
                    <select class="form-select form-select-sm" name="contacto_parentesco">
                       <option selected disabled>Seleccione...</option>
                          <option value="Esposa(o)">Esposa(o)</option>
                          <option value="Hija(o)">Hija(o)</option>
                          <option value="Madre">Madre</option>
                          <option value="Padre">Padre</option>
                          <option value="Hermana(o)">Hermana(o)</option>
                          <option value="Tia(o)">Tia(o)</option>
                          <option value="Sobrina(o)">Sobrina(o)</option>
                          <option value="Abuela(o)">Abuela(o)</option>
                          <option value="Pariente">Pariente</option>
                          <option value="Otro">Otro</option>
                    </select>
                    @error('contacto_parentesco')
                      <small class="text-danger"> * {{$message}}</small>
                    @enderror
                </td>
                <td>
                    <input type="number" min='1950' max="2030" class="form-control form-control-sm" name="conviviente" value="">
                </td>
                <td>
                    <input type="date" min="2010" max="2030" class="form-control form-control-sm" name="fecha_control" value="">
                    {{-- @error('fecha_control')
                    <small class="text-danger"> * {{$message}}</small>
                    @enderror --}}
                </td>
                <td>
                     <select  class="form-select form-select-sm" name="sintomatico_piel" >
                        <option disabled selected>Seleccione...</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    {{-- @error('sintomatico_piel')
                    <small class="text-danger"> * {{$message}}</small>
                    @enderror --}}
                </td>

                <td>
                    <select  class="form-select form-select-sm"  name="laboratorio_baar" >
                        <option disabled selected="">Seleccione...</option>
                        <option value="-">-</option>
                        <option value="+">+</option>
                        <option value="++">++</option>
                        <option value="+++">+++</option>
                    </select>
                    {{-- @error('laboratorio_baar')
                    <small class="text-danger"> * {{$message}}</small>
                    @enderror --}}
                </td>
                <td>
                    <select  class="form-select form-select-sm"  name="antecedente_lepra" >
                        <option disabled selected="">Seleccione...</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </td>
                <td>
                    <input type="date" name="contacto_fecha_diagnostico" class="form-control form-control-sm" value="">
                </td>
                <td>
                    <input type="text" name="contacto_diagnostico" class="form-control form-control-sm" value="">
                    {{-- @error('contacto_diagnostico')
                    <small class="text-danger"> * {{$message}}</small>
                    @enderror --}}

                </td>
                <td>
                    <input type="text" name="observaciones" class="form-control form-control-sm" value="">
                    {{-- @error('observaciones')
                    <small class="text-danger"> * {{$message}}</small>
                    @enderror --}}
                </td>
                <td>
                   <button class="btn btn-sm btn-success" type="submit">Guardar</button>
                </td>
            </tr>
        </form>

        </tbody>
    </table>
</div>


<script type="text/javascript">
 $(".alert").fadeOut(9500 );

 
 $("span#destroy").on('click', function () {
    var actual_form = $(this).attr('class').toString();
    $('#'+actual_form).submit();
    //console.log('#'+actual_form);
 })
</script>
<style type="text/css">
    table input[type="number"]{
         -webkit-appearance: none;
          margin: 0;
          -moz-appearance: textfield;

    }
</style>

@endsection();