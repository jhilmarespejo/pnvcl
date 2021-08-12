<div class="container row">
    <fieldset class="row mb-2 field-border">
        {{-- {{$errors}} --}}
        <legend class="field-border">2. Datos personales y epidemiológicos</legend>

        <div class="col">
            <select class="form-select" name="datos_personales[tipo_caso]" data-bs-toggle="tooltip" data-bs-placement="top" title="Tipo de caso">
                <option disabled value="" {{ (old('datos_personales.tipo_caso') == '')? 'selected':'' }}>Tipo de caso</option>
                <option value="Nuevo" {{ (old('datos_personales.tipo_caso') == 'Nuevo')? 'selected':'' }}>Nuevo</option>
                <option value="Crónico" {{ (old('datos_personales.tipo_caso') == 'Crónico')? 'selected':'' }}>Crónico</option>
                <option value="Recaida" {{ (old('datos_personales.tipo_caso') == 'Recaida')? 'selected':'' }}>Recaida</option>
            </select>
            @error('datos_personales.tipo_caso')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>

        <div class="col">
            <input type="hidden" id="datos_personales_servicio_salud_id" name="datos_personales[servicio_salud_id]" value="">
            <input type="text" name="datos_personales[nombres]" value="{{old('datos_personales.nombres')}}" id="" class="form-control" placeholder="Nombres" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombres">
            @error('datos_personales.nombres')
               <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
            
        </div>
        <div class="col">
            <input type="text" name="datos_personales[apellidos]" value="{{old('datos_personales.apellidos')}}" id="" class="form-control" placeholder="Apellidos" data-bs-toggle="tooltip" data-bs-placement="top" title="Apelidos">
            @error('datos_personales.apellidos')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="datos_personales[ci]" value="{{old('datos_personales.ci')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Carnet de Identidad" id="" class="form-control" placeholder="Carnet de Identidad" >
            @error('datos_personales.ci')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col" >
            {{-- {{old('datos_personales.ci_exp')}} --}}
            <select class="form-select" name="datos_personales[ci_exp]" data-bs-toggle="tooltip" data-bs-placement="top" title="CI Expedición">
                <option disabled value="" {{ (old('datos_personales.ci_exp') == '')? 'selected':'' }}>CI Exp.</option>
                <option value="BN" {{ (old('datos_personales.ci_exp') == 'BN')? 'selected':'' }} >Beni</option>
                <option value="PN" {{ (old('datos_personales.ci_exp') == 'PN')? 'selected':'' }} >Pando</option>
                <option value="SC" {{ (old('datos_personales.ci_exp') == 'SC')? 'selected':'' }} >Santa Cruz</option>
                <option value="CH" {{ (old('datos_personales.ci_exp') == 'CH')? 'selected':'' }} >Chuquisaca</option>
                <option value="CBBA" {{ (old('datos_personales.ci_exp') == 'CBBA')? 'selected':'' }} >Cochabamba</option>
                <option value="TJ" {{ (old('datos_personales.ci_exp') == 'TJ')? 'selected':'' }} >Tarija</option>
                <option value="LP" {{ (old('datos_personales.ci_exp') == 'LP')? 'selected':'' }} >La Paz</option>
                <option value="OR" {{ (old('datos_personales.ci_exp') == 'OR')? 'selected':'' }} >Oruro</option>
                <option value="PT" {{ (old('datos_personales.ci_exp') == 'PT')? 'selected':'' }} >Potosí</option>
            </select>
            @error('datos_personales.ci_exp')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
         <div class="row mt-3"></div>
        <div class="col">
            <input type="text" name="datos_personales[fecha_nacimiento]" value="{{old('datos_personales.fecha_nacimiento')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" onblur="(this.type='text')" >
            @error('datos_personales.fecha_nacimiento')
            <small class="fs-8 text-danger"> * {{$message}}</small>
                @enderror
        </div>
        <div class="col">
            <input type="number" max="150" min="0" name="datos_personales[edad]" value="{{old('datos_personales.edad')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edad" id="edad" class="form-control" class="form-control" placeholder="Edad" >
            @error('datos_personales.edad')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col">
            <select class="form-select" name="datos_personales[sexo]" data-bs-toggle="tooltip" data-bs-placement="top" title="Sexo">
                <option disabled value="" {{ (old('datos_personales.sexo') == '')? 'selected':'' }}>Sexo</option>
                <option value="F" {{ (old('datos_personales.sexo') == 'F')? 'selected':'' }}>F</option>
                <option value="M" {{ (old('datos_personales.sexo') == 'M')? 'selected':'' }}>M</option>
            </select>
            @error('datos_personales.sexo')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
      
        <div class="col">
            <input type="number" min="0" name="datos_personales[telefono]" value="{{old('datos_personales.telefono')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Teléfono" id="" class="form-control" placeholder="Teléfono">
            @error('datos_personales.telefono')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col">
            <input type="number" min="0" name="datos_personales[celular]" value="{{old('datos_personales.celular')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Celular" id="" class="form-control" placeholder="Celular">
            @error('datos_personales.celular')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="row mt-3"></div>
        <div class="col-2">
            <label class="form-label"><strong>Domicilio actual: </strong> </label>
        </div>
        <div class="col xs sm md">
           {{--  <input type="text" id="" name="" data-bs-toggle="tooltip" data-bs-placement="top" title="Departamento" class="form-control" placeholder="Departamento"> --}}

            <select class="form-select" id="dp_departamentos" name="dp_departamentos" data-bs-toggle="tooltip" data-bs-placement="top" title="Departamento" placeholder="Departamento">
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
        <div class="col dp-provincias"></div>
        <div class="col dp-municipios"></div>

        <div class="col-2">
            <input type="text" name="datos_personales[localidad]" value="{{old('datos_personales.localidad')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Localidad" id="" class="form-control" placeholder="Localidad">
            @error('datos_personales.localidad')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col-2">
            <input type="text" name="datos_personales[zona]" value="{{old('datos_personales.zona')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Zona" id="" class="form-control" placeholder="Zona">
            @error('datos_personales.zona')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="mb-3"></div>
        <div class="col-2">
            <input type="text" name="datos_personales[calle]" value="{{old('datos_personales.calle')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Calle" id="" class="form-control" placeholder="Calle">
            @error('datos_personales.calle')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
       
        <div class="col-2">
            <input type="text" min="0" name="datos_personales[numero]" value="{{old('datos_personales.numero')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Número de la vivienda" id="" class="form-control" placeholder="Número">
            @error('datos_personales.numero')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col-2">
            <input type="number" min="0" max="100" name="datos_personales[tiempo_res_actual_cantidad]" value="{{old('datos_personales.tiempo_res_actual_cantidad')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Tiempo de residencia" id="" class="form-control col-2" placeholder="Tiempo de residencia">
            @error('datos_personales.tiempo_res_actual_cantidad')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col-2">
            {{-- {{old('datos_personales.tiempo_res_actual_unidad')}} --}}
            <select name="datos_personales[tiempo_res_actual_unidad]" value="{{old('datos_personales.tiempo_res_actual_unidad')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Años/Meses" id="" class="form-select col-2" title="Selecciones años o meses">
                <option value="" disabled {{ (old('datos_personales.tiempo_res_actual_unidad') == '')? 'selected':'' }}>Seleccione</option>
                <option value="Años" {{ (old('datos_personales.tiempo_res_actual_unidad') == 'Años')? 'selected':'' }}>Años</option>
                <option value="Meses" {{ (old('datos_personales.tiempo_res_actual_unidad') == 'Meses')? 'selected':'' }}>Meses</option>
            </select>
            @error('datos_personales.tiempo_res_actual_unidad')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>    
        
        <div class="col-2">
            <input type="text" name="datos_personales[ocupacion_paciente]" value="{{old('datos_personales.ocupacion_paciente')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Ocupación del paciente" id="" class="form-control" placeholder="Ocupación del paciente">
            @error('datos_personales.ocupacion_paciente')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col-2">
            <select class="form-select" name="datos_personales[vive_solo]" data-bs-toggle="tooltip" data-bs-placement="top" title="Vive solo">
                <option value="" {{ (old('datos_personales.vive_solo') == '')? 'selected':'' }}>¿Paciente vive solo?</option>
                <option value="Si" {{ (old('datos_personales.vive_solo') == 'Si')? 'selected':'' }}>Si</option>
                <option value="No" {{ (old('datos_personales.vive_solo') == 'No')? 'selected':'' }}>No</option>
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
                            <input type="hidden" name="datos_personales[latlng]" id="latlng" value="">
                        </div>
                    </div>
                    <div class="row ">
                        <label class="form-label"><strong>Opcion 2:</strong> Subir una foto del croquis hecho a mano</label>
                        <input type="file" name="datos_personales[url_croquis]" id="" class="form-control" placeholder="Subir una foto del croquis" accept="image/*">
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="row mt-3 field-border">
                <div class="row mt-1">
                    <div class="col">
                        <input type="number"  min="0" name="datos_personales[celular_referencia]" value="{{old('datos_personales.celular_referencia')}}"data-bs-toggle="tooltip" data-bs-placement="top" id="" class="form-control col" title="Celular de referencia" placeholder="Celular de referencia">
                        @error('datos_personales.celular_referencia')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                    <div class="row"></div>
                    <div class="col mt-1">
                        <input autocomplete="off" type="text" name="datos_personales[serv_salud_cercano]" value="{{old('datos_personales.serv_salud_cercano')}}" data-bs-toggle="tooltip" data-bs-placement="top" id="search" class="form-control col" placeholder="Servicio de salud más cercano" title="Servicio de salud más cercano">
                        @error('datos_personales.serv_salud_cercano')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                    
                </div>
                <div class="col mt-2">
                    <div class="row mt-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#residenciaanterior" data-bs-whatever="@mdo">Residencia Anterior</button>
                    </div>
                </div>
                
               
                <div class="row mt-2">
                    <div class=" mb-1">
                        <label class="">Lugar de contagio</label>
                        <input type="text" name="datos_personales[lugar_contagio]" value="{{old('datos_personales.lugar_contagio')}}" data-bs-toggle="tooltip" data-bs-placement="top" id="" class="form-control col" placeholder="Lugar de contagio" title="Lugar de contagio" class="form-control " 
                        placeholder="">
                        @error('datos_personales.lugar_contagio')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                    <div class=" mb-1">
                        <label class="">A sido contacto de un caso de lepra</label>
                        <select class="form-select" name="datos_personales[contacto_lepra]"  data-bs-toggle="tooltip" data-bs-placement="top" title="Ha sido contacto de un caso de lepra">
                            <option disabled {{ (old('datos_personales.contacto_lepra') == '')? 'selected':'' }}>Seleccione...</option>
                            <option value="Si" {{ (old('datos_personales.contacto_lepra') == 'Si')? 'selected':'' }}>Si</option>
                            <option value="No" {{ (old('datos_personales.contacto_lepra') == 'No')? 'selected':'' }}>No</option>
                        </select>
                        @error('datos_personales.contacto_lepra')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror

                    </div>
                    <div class="mb-1">
                        <label class=""> Parentesco</label>
                        <select class="form-select col" name="datos_personales[parentesco]" data-bs-toggle="tooltip" data-bs-placement="top" title="Parentesco">
                            <option disabled {{ (old('datos_personales.parentesco') == '')? 'selected':'' }}>Seleccione...</option>
                            <option value="Pariente" {{ (old('datos_personales.parentesco') == 'Pariente')? 'selected':'' }}>Pariente</option>
                            <option value="Vecino" {{ (old('datos_personales.parentesco') == 'Vecino')? 'selected':'' }}>Vecino</option>
                            <option value="Otro" {{ (old('datos_personales.parentesco') == 'Otro')? 'selected':'' }}>Otro</option>
                        </select>
                        @error('datos_personales.parentesco')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <fieldset class="row mt-4" >
                    <legend class="field-border">3. Control de contactos</legend>
                    <br>
                    <button type="button" class=" btn btn-primary " data-bs-toggle="modal" data-bs-target="#controlContactos" data-bs-whatever="@mdo">Agregar datos de contactos</button>
                </fieldset>
            </fieldset>
        </div>
    </fieldset>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>
<script type="text/javascript">
    var route = "{{ url('autocomplete-search') }}";
    $('#search').typeahead({
        source: function (query, process) {
            return $.get(route, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });

 
    $('#dp_departamentos').change(function (params) {
        doAjax(
          {'sedes_id':$(this).val(), 'q':'provincias', 'new_tag':'dp_provincias'},
          function() { },
          function (response) { 
            $("#do_provincias, #dp_municipios").remove(); 
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
    })
    
</script>