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