<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin="">
</script>

{{-- <script type="text/javascript">
    $( document ).ready(function() {
    const user = @json($dp_record);
  console.log(user);
  });
</script> --}}
<div class="position-relative">
    @if(Session::has('success'))
        <div class="col-4 alert alert-success alert-dismissible notification" role="alert">
            <strong>{{Session::get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('warning'))
        <div class="col-4 alert alert-warning alert-dismissible notification" role="alert">
            <strong>{{Session::get('warning') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>


<div class="container-xxl">
    <form method="post" action="{{ route('paciente.update') }}" >
        <fieldset class="row mb-2 field-border">
            {{-- {{$errors}} --}}
            {{-- {{ $dp_records }} --}}
            @foreach ($dp_addresses as $dp_address) 
            @endforeach

            @foreach ($dp_records as $dp_record) 
            @endforeach

            @foreach ($healt_services as $healt_service)
            @endforeach

        <legend class="field-border">2. Datos personales y epidemiológicos</legend>
            @csrf
            @method('put')

            <input type="hidden" id="" name="datos_personales[id]" value="{{$dp_record->id}}">
            <input type="hidden" id="datos_personales_servicio_salud_id" name="datos_personales[servicio_salud_id]" value="{{$dp_record->servicio_salud_id}}">
            <input type="hidden" id="datos_personales_servicio_salud_id" name="datos_personales[municipio_id]" value="{{$dp_record->municipio_id }}">

            <div class="col">
                <select class="form-select" name="datos_personales[tipo_caso]" data-bs-toggle="tooltip" data-bs-placement="top" title="Tipo de caso">
                    <option disabled value="" {{ ($dp_record->tipo_caso == '')? 'selected':'' }}>Tipo de caso</option>
                    <option value="Nuevo" {{ ($dp_record->tipo_caso == 'Nuevo')? 'selected':'' }}>Nuevo</option>
                    <option value="Crónico" {{ ($dp_record->tipo_caso == 'Crónico')? 'selected':'' }}>Crónico</option>
                    <option value="Recaida" {{ ($dp_record->tipo_caso == 'Recaida')? 'selected':'' }}>Recaida</option>
                </select>
                @error('datos_personales.tipo_caso')
                <small class="fs-8 text-danger"> * {{$message}}</small>`
                @enderror
            </div>
            <div class="col">
                <select class="form-select" name="datos_personales[caso]" data-bs-toggle="tooltip" data-bs-placement="top" title="Caso importado/autóctono">
                    <option disabled value="" {{ ($dp_record->caso == '')? 'selected':'' }}>Caso</option>
                    <option value="Autoctono" {{ ($dp_record->caso == 'Autoctono')? 'selected':'' }}>Autóctono</option>
                    <option value="Importado" {{ ($dp_record->caso == 'Importado')? 'selected':'' }}>Importado</option>
                </select>
                @error('datos_personales.caso')
                <small class="fs-8 text-danger"> * {{$message}}</small>`
                @enderror
            </div>
            <div class="col">
                <input type="text" name="datos_personales[historia_clinica]" value="{{$dp_record->historia_clinica}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Número de historia clínica" id="" class="form-control" placeholder="Número de historia clínica" >
                @error('datos_personales.historia_clinica')
                    <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">               
                <input type="text" name="datos_personales[nombres]" value="{{$dp_record->nombres}}" id="" class="form-control" placeholder="Nombres" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombres">
                @error('datos_personales.nombres')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="datos_personales[apellidos]" value="{{$dp_record->apellidos}}" id="" class="form-control" placeholder="Apellidos" data-bs-toggle="tooltip" data-bs-placement="top" title="Apelidos">
                @error('datos_personales.apellidos')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="row mt-3"></div>
            <div class="col">
                <input id="ci" type="text" name="datos_personales[ci]" value="{{$dp_record->ci}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Carnet de Identidad" class="form-control" placeholder="Carnet de Identidad" >
                <span id="findci"></span>
                @error('datos_personales.ci')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col" >
                <select id="ci_exp" class="form-select" name="datos_personales[ci_exp]" data-bs-toggle="tooltip" data-bs-placement="top" title="CI Expedición">
                    <option disabled value="" {{ ($dp_record->ci_exp == '')? 'selected':'' }}>CI Exp.</option>
                    <option value="BN" {{ ($dp_record->ci_exp == 'BN')? 'selected':'' }} >Beni</option>
                    <option value="PN" {{ ($dp_record->ci_exp == 'PN')? 'selected':'' }} >Pando</option>
                    <option value="SC" {{ ($dp_record->ci_exp == 'SC')? 'selected':'' }} >Santa Cruz</option>
                    <option value="CH" {{ ($dp_record->ci_exp == 'CH')? 'selected':'' }} >Chuquisaca</option>
                    <option value="CBBA" {{ ($dp_record->ci_exp == 'CBBA')? 'selected':'' }} >Cochabamba</option>
                    <option value="TJ" {{ ($dp_record->ci_exp == 'TJ')? 'selected':'' }} >Tarija</option>
                    <option value="LP" {{ ($dp_record->ci_exp == 'LP')? 'selected':'' }} >La Paz</option>
                    <option value="OR" {{ ($dp_record->ci_exp == 'OR')? 'selected':'' }} >Oruro</option>
                    <option value="PT" {{ ($dp_record->ci_exp == 'PT')? 'selected':'' }} >Potosí</option>
                    <option value="Sin CI" {{ ($dp_record->ci_exp == 'No tiene CI')? 'selected':'' }} >No tiene CI</option>
                </select>
                @error('datos_personales.ci_exp')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>

            <div class="col">
                <input disabled type="text" name="datos_personales[otro_documento]" value="{{$dp_record->otro_documento}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Otro domento de indentificación" id="otro_documento" class="form-control" placeholder="Otro domento de indentificación" >
                {{-- @error('datos_personales.otro_documento')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror --}}
            </div>
            <div class="col">
                <input disabled type="text" name="datos_personales[otro_documento_numero]" value="{{$dp_record->otro_documento_numero}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Número del documento" id="otro_documento_numero" class="form-control" placeholder="Número del documento" >
                {{-- @error('datos_personales.otro_documento_numero')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror --}}
            </div>

            <div class="col">
                <input type="text" name="datos_personales[fecha_nacimiento]" value="{{$dp_record->fecha_nacimiento}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" onblur="(this.type='text')" >
                @error('datos_personales.fecha_nacimiento')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="row mt-3"></div>
            <div class="col">
                <input type="number" max="150" min="0" name="datos_personales[edad]" value="{{$dp_record->edad}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edad" id="edad" class="form-control" class="form-control" placeholder="Edad" >
                @error('datos_personales.edad')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">
                <select class="form-select" name="datos_personales[sexo]" data-bs-toggle="tooltip" data-bs-placement="top" title="Sexo">
                    <option disabled value="" {{ ($dp_record->sexo == '')? 'selected':'' }}>Sexo</option>
                    <option value="Fem" {{ ($dp_record->sexo == 'Fem')? 'selected':'' }}>Fem</option>
                    <option value="Masc" {{ ($dp_record->sexo == 'Masc')? 'selected':'' }}>Masc</option>
                </select>
                @error('datos_personales.sexo')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>

            <div class="col">
                <input type="number" min="20000000" name="datos_personales[telefono]" value="{{$dp_record->telefono}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Teléfono" id="" class="form-control" placeholder="Teléfono">
                @error('datos_personales.telefono')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">
                <input type="number" min="60000000" name="datos_personales[celular]" value="{{$dp_record->celular}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Celular" id="" class="form-control" placeholder="Celular">
                @error('datos_personales.celular')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col"></div>
            <div class="row mt-3"></div>
            <div class="col">
                <label class="form-label"><strong>Domicilio actual: </strong> </label>
                {{-- <input type="text"  class="form-control" value="Domicilio actual:"> --}}
            </div>
            <div class="col">
                {{--  <input type="text" id="" name="" data-bs-toggle="tooltip" data-bs-placement="top" title="Departamento" class="form-control" placeholder="Departamento"> --}}

                <select class="form-select" id="dp_departamentos" name="" data-bs-toggle="tooltip" data-bs-placement="top" title="Departamento" placeholder="Departamento">
                    <option  disabled {{ ($dp_address->sedes == '')? 'selected':'' }} >Seleccione...</option>
                    <option  value="1" {{ ($dp_address->sedes == 'Pando')? 'selected':'' }} >Pando</option>
                    <option  value="2" {{ ($dp_address->sedes == 'Beni')? 'selected':'' }} >Beni</option>
                    <option  value="3" {{ ($dp_address->sedes == 'Santa Cruz')? 'selected':'' }} >Santa Cruz</option>
                    <option  value="4" {{ ($dp_address->sedes == 'Cochabamba')? 'selected':'' }} >Cochabamba</option>
                    <option  value="6" {{ ($dp_address->sedes == 'Tarija')? 'selected':'' }} >Tarija</option>
                    <option  value="5" {{ ($dp_address->sedes == 'Chuquisaca')? 'selected':'' }} >Chuquisaca</option>
                    <option  value="9" {{ ($dp_address->sedes == 'La Paz')? 'selected':'' }} >La Paz</option>
                    <option  value="8" {{ ($dp_address->sedes == 'Oruro')? 'selected':'' }} >Oruro</option>
                    <option  value="7" {{ ($dp_address->sedes == 'Potosí')? 'selected':'' }} >Potosí</option>
                </select>
            </div>

            <div class="col dp-provincias">
                <input readonly type="text" value="{{$dp_address->provincia}}" data-bs-toggle="tooltip" data-bs-placement="top" id="" class="form-control" placeholder="Provincia" title="Provincia" class="form-control ">
            </div>

            <div class="col dp-municipios">
                <input readonly id="municipio" type="text" value="{{$dp_address->municipio}}" data-bs-toggle="tooltip" data-bs-placement="top" class="form-control" placeholder="Municipio" title="Municipio" class="form-control ">
            </div>

            <div class="col">
                <input type="text" name="datos_personales[localidad]" value="{{$dp_record->localidad}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Localidad" id="" class="form-control" placeholder="Localidad">
                @error('datos_personales.localidad')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>

            <div class="mb-3"></div>

            <div class="col">
                <input type="text" name="datos_personales[zona]" value="{{$dp_record->zona}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Zona" id="" class="form-control" placeholder="Zona">
                @error('datos_personales.zona')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>

            <div class="col">
                <input type="text" name="datos_personales[calle]" value="{{$dp_record->calle}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Calle" id="" class="form-control" placeholder="Calle">
                @error('datos_personales.calle')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>

            <div class="col">
                <input type="text" name="datos_personales[numero]" value="{{$dp_record->numero}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Número de la vivienda" id="" class="form-control" placeholder="Número">
                @error('datos_personales.numero')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">
                <input type="text" min="0" max="100" name="datos_personales[tiempo_res_actual]" value="{{$dp_record->tiempo_res_actual}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Tiempo de residencia" id="" class="form-control col-2" placeholder="Tiempo de residencia">
                @error('datos_personales.tiempo_res_actual')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>


            <div class="col">
                <input type="text" name="datos_personales[ocupacion_paciente]" value="{{$dp_record->ocupacion_paciente}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Ocupación del paciente" id="" class="form-control" placeholder="Ocupación del paciente">
                @error('datos_personales.ocupacion_paciente')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>
            <div class="col">
                <select class="form-select" name="datos_personales[vive_solo]" data-bs-toggle="tooltip" data-bs-placement="top" title="Vive solo">
                    <option value="" {{ ($dp_record->vive_solo == '')? 'selected':'' }}>¿Paciente vive solo?</option>
                    <option value="Si" {{ ($dp_record->vive_solo == 'Si')? 'selected':'' }}>Si</option>
                    <option value="No" {{ ($dp_record->vive_solo == 'No')? 'selected':'' }}>No</option>
                </select>
                @error('datos_personales.vive_solo')
                <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
            </div>

            <div class=" mt-3"></div>
            <div class="col">
                <fieldset class="row mt-3 field-border">
                    <label><strong>Croquis de la vivienda:</strong></label>
                    <div class="col">
                        <div class="row mb-3">
                            <label for="" class="form-label"><strong>Opcion 1:</strong> Con Maps</label>
                            <div id="map" style="border:1px; width:600px; height:300px;" >
                                <input type="hidden" name="datos_personales[latlng]" id="latlng" value="{{ $dp_record->latlng }}" >
                            </div>
                        </div>
                        <div class="row text-center">
                            {{-- <label class="form-label"><strong>Opcion 2:</strong> Subir una foto del croquis hecho a mano</label>
                            <input type="file" name="datos_personales[url_croquis]" id="" class="form-control" placeholder="Subir una foto del croquis" accept="image/*"> --}}

                            <button type="button" class="btn btn-sm btn-primary mt-2 col-6" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Croquis del domicilio
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <img src="{{ $dp_record->url_croquis }}" class="img-fluid rounded mx-auto d-block">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col">
                <fieldset class="row mt-3 field-border">
                    <div class="row mt-1">
                        <div class="col">
                            <input type="number"  min="60000000" name="datos_personales[celular_referencia]" value="{{$dp_record->celular_referencia}}"data-bs-toggle="tooltip" data-bs-placement="top" id="" class="form-control col" title="Celular de referencia" placeholder="Celular de referencia">
                            @error('datos_personales.celular_referencia')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                            @enderror
                        </div>
                        <div class="row"></div>
                        <div class="col mt-1" id="ssc">
                            <input type="hidden" name="datos_personales[serv_salud_id_cercano]" value="{{$healt_service->serv_salud_id_cercano}}"> 

                            <input readonly type="text" value="{{$healt_service->serv_salud}}" data-bs-toggle="tooltip" data-bs-placement="top" id="" class="form-control col" placeholder="Servicio de salud cercano" title="Servicio de salud cercano" class="form-control ">
                        </div>

                        </div>
                    <div class="row mt-2">
                    <div class=" mb-1">
                        <label class="">Lugar probable de contagio</label>
                        <input type="text" name="datos_personales[lugar_contagio]" value="{{$dp_record->lugar_contagio}}" data-bs-toggle="tooltip" data-bs-placement="top" id="" class="form-control col" placeholder="Lugar de contagio" title="Lugar de contagio" class="form-control " 
                        placeholder="">
                        @error('datos_personales.lugar_contagio')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                    <div class=" mb-1">
                        <label class="">A sido contacto de un caso de lepra</label>
                        <select class="form-select" name="datos_personales[contacto_lepra]"  data-bs-toggle="tooltip" data-bs-placement="top" title="Ha sido contacto de un caso de lepra">
                            <option disabled {{ ($dp_record->contacto_lepra == '')? 'selected':'' }}>Seleccione...</option>
                            <option value="Si" {{ ($dp_record->contacto_lepra == 'Si')? 'selected':'' }}>Si</option>
                            <option value="No" {{ ($dp_record->contacto_lepra == 'No')? 'selected':'' }}>No</option>
                        </select>
                        @error('datos_personales.contacto_lepra')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror

                    </div>
                    <div class="mb-1">
                        <label class=""> Parentesco</label>
                        <select class="form-select col" name="datos_personales[parentesco]" data-bs-toggle="tooltip" data-bs-placement="top" title="Parentesco">
                            <option selected disabled>Seleccione...</option>
                            <option value="Esposa(o)" {{ ($dp_record->parentesco == 'Esposa(o)')? 'selected':'' }} >Esposa(o)</option>
                            <option value="Hija(o)" {{ ($dp_record->parentesco == 'Hija(o)')? 'selected':'' }} >Hija(o)</option>
                            <option value="Madre" {{ ($dp_record->parentesco == 'Madre')?  'selected':'' }} >Madre</option>
                            <option value="Padre" {{ ($dp_record->parentesco == 'Padre')?  'selected':'' }} >Padre</option>
                            <option value="Hermana(o)" {{ ($dp_record->parentesco == 'Hermana(o)')? 'selected':'' }} >Hermana(o)</option>
                            <option value="Tia(o)" {{ ($dp_record->parentesco == 'Tia(o)')? 'selected':'' }} >Tia(o)</option>
                            <option value="Sobrina(o)" {{ ($dp_record->parentesco == 'Sobrina(o)')? 'selected':'' }} >Sobrina(o)</option>
                            <option value="Abuela(o)" {{ ($dp_record->parentesco == 'Abuela(o)')? 'selected':'' }} >Abuela(o)</option>
                            <option value="Vecino" {{ ($dp_record->parentesco == 'Vecino')?  'selected':'' }} >Vecino</option>
                            <option value="Otro" {{ ($dp_record->parentesco == 'Otro')?  'selected':'' }} >Otro</option>
                        </select>
                        @error('datos_personales.parentesco')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </fieldset> 
            </div>
            <div class="row mt-3 justify-content-md-center">
                <button class="btn btn-success col-4" type="submit">Actualizar datos</button>
            </div>
        </fieldset>
    </form>
    <form method="post" action="{{ route('paciente.update') }}">
        <div class="container row">
            <fieldset class="col mb-2 field-border">
                <legend class="field-border">Residencia anterior</legend>
                <div class="table-responsived">
                    <table class="table table-bordered text-center">
                      <thead>
                          <tr>
                              <th>Departamento</th>
                              <th>Provincia</th>
                              <th>Municipio</th>
                              <th>Localidad</th>
                              <th>Tiempo de residencia</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($previous_residences as $prev_res)
                            <tr>
                              <td>
                                <select class="form-select form-select-sm" id="dpto2" name="">
                                    <option  disabled {{ ($prev_res->sedes_id == '')? 'selected':'' }} >Seleccione...</option>
                                    <option  value="1" {{ ($prev_res->sedes_id == '1')? 'selected':'' }} >Pando</option>
                                    <option  value="2" {{ ($prev_res->sedes_id == '2')? 'selected':'' }} >Beni</option>
                                    <option  value="3" {{ ($prev_res->sedes_id == '3')? 'selected':'' }} >Santa Cruz</option>
                                    <option  value="4" {{ ($prev_res->sedes_id == '4')? 'selected':'' }} >Cochabamba</option>
                                    <option  value="6" {{ ($prev_res->sedes_id == '6')? 'selected':'' }} >Tarija</option>
                                    <option  value="5" {{ ($prev_res->sedes_id == '5')? 'selected':'' }} >Chuquisaca</option>
                                    <option  value="9" {{ ($prev_res->sedes_id == '9')? 'selected':'' }} >La Paz</option>
                                    <option  value="8" {{ ($prev_res->sedes_id == '8')? 'selected':'' }} >Oruro</option>
                                    <option  value="7" {{ ($prev_res->sedes_id == '7')? 'selected':'' }} >Potosí</option>
                    
                                </select>
                              </td>
                              <td>
                                <div id="provincia_anterior2">
                                    <input readonly type="text" class="form-control form-control-sm" name="" value="{{ $prev_res->provincia }}" >
                                </div>
                              </td>
                              <td>
                                <div id="municipio_anterior2">
                                    <input readonly type="text" class="form-control form-control-sm" name="" value="{{ $prev_res->municipio }}" >
                                </div>
                              </td>
                              <td>
                                <input readonly type="text" class="form-control form-control-sm" name="residencia_anterior[2][localidad]" value="{{ $prev_res->localidad }}">
                              </td>
                              <td>
                                <input type="hidden" id="municipio_id2" name="residencia_anterior[2][municipio_id]" value="">

                                  <input name="residencia_anterior[2][tiempo_res_ant_cantidad]" type="number" min="0" max="100" class="form-control form-control-sm col-2" value="{{ $prev_res->tiempo_res_ant_cantidad }}" > 

                                  <select class="col-4 form-select form-select-sm" name="residencia_anterior[2][tiempo_res_ant_unidad]" >
                                      <option selected disabled>Seleccione...</option>
                                      <option value="Meses" {{ ($prev_res->tiempo_res_ant_unidad == 'Meses')? 'selected':'' }}>Meses</option>
                                      <option value="Años" {{ ($prev_res->tiempo_res_ant_unidad == 'Años')? 'selected':'' }}>Años</option>
                                  </select>
                              </td>
                            </tr> 
                        @endforeach 
                      </tbody>
                    </table>
                </div>
                <div class="row mt-3 justify-content-md-center">
                    <button type="xxxx" class="btn btn-success col-4" data-bs-dismiss="modal">Actualizar datos</button>
                </div>
            </fieldset>
        </div>
    </form>
</div>
{{-- <script src="/maps/index.js"></script> --}}
<script type="text/javascript">
$(document).ready( function () {
    $(".alert").fadeOut(9500 );

    $('#ci_exp').change(function () {
        if ( $(this).val() == 'Sin CI' ){
            $('#ci').val("Sin CI");
            $('#ci').prop('disabled', true);
            $('#otro_documento').prop('disabled', false);            
            $('#otro_documento_numero').prop('disabled', false);
            $(this).css('box-shadow', '0px 0px 5px red')
    } else {
        $('#ci').val("");
        $('#ci').prop('disabled', false);
        $('#otro_documento').prop('disabled', true);            
        $('#otro_documento_numero').prop('disabled', true);
        $(this).css('box-shadow', 'none')
    }
    });



    $('#dp_departamentos').change(function (params) {
        doAjax(
            {'sedes_id':$(this).val(), 'q':'provincias', 'new_tag':'dp_provincias'},
            function() { },
            function (response) { 
                $("#dp_provincias, .dp-municipios>*, #ssc>*").remove(); 
                $('.dp-provincias').html(response);}, 
                function(){alert("error")}
        );
    });


    $('#fecha_nacimiento').focusout(function() {
        var hoy = new Date();
        var cumpleanos = new Date($(this).val());
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }
        $('#edad').val(edad);
    });

// CODE FOR SET THE MAP    
    //const latlng = @json($dp_record->latlng);

    var latlng = @json($dp_record->latlng).split(',');
    console.log(latlng[0]);
    var map = L.map('map').setView([latlng[0],latlng[1]], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiamhpbG1hcmVzcGVqbyIsImEiOiJja3FoZmNsZGEwOW41MzBucWtyaHhqYTl4In0.l01-lBzlhdTmS3XGFXIp7A'
    }).addTo(map);

    var popup = L.popup();

    function onMapClick(e) {
        popup.setLatLng(e.latlng)
        L.marker([parseFloat(e.latlng.lat), parseFloat(e.latlng.lng)], {draggable: true}).addTo(map);

    }
    var marker =  L.marker([ latlng[0],latlng[1] ], {draggable: 'true'}).addTo(map);

    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        $('#latlng').val(position['lat']+','+position['lng']);
    });

});
</script>