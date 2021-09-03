<fieldset class="field-border col">
   <div class="col">
        
        <label class="form-label" ><strong>9.1 Traramiento anterior por:</strong></label>
        <br>
        <select name="tratamiento[tto_anterior]" id="" class="form-select">
            <option value="" disabled {{(old('tratamiento.tto_anterior') == '')? 'selected':'' }} >Seleccione</option>
            <option value="Abandono" {{(old('tratamiento.tto_anterior') == 'Abandono')? 'selected':'' }}>Abandono</option>
            <option value="Fracaso terapéutico" {{(old('tratamiento.tto_anterior') == 'Fracaso terapéutico')? 'selected':'' }}>Fracaso terapéutico</option>
            <option value="Recaída" {{(old('tratamiento.tto_anterior') == 'Recaída')? 'selected':'' }}>Recaída</option>
            <option value="Ninguno" {{(old('tratamiento.tto_anterior') == 'Ninguno')? 'selected':'' }}>Ninguno</option>
        </select>
        @error('tratamiento.tto_anterior')
            <small class="fs-8 text-danger"> * {{$message}}</small>
        @enderror
   </div>
   <div class="col ">
        <label class="form-label" >Esquema:</label>

        <input type="hidden" name="tratamiento[anterior_multibacilar]" value="">
        <input class="form-check-input" type="checkbox" name="tratamiento[anterior_multibacilar]" value="Si">
        <label class="form-check-label" for="lepromatosa">Multibacilar</label>


        <input type="hidden" name="tratamiento[anterior_paucibacilar]" value="">
        <input class="form-check-input" type="checkbox" name="tratamiento[anterior_paucibacilar]" value="Si">
        <label class="form-check-label" for="dimofa">Paucibacilar</label>
</fieldset>
    
    {{-- <input type="date" name="bacteriologia[fecha_muestra]" value="{{old('bacteriologia.fecha_muestra')}}" id="" class="form-control" placeholder="Fecha de toma de muestra" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de toma de muestra">
    @error('bacteriologia.fecha_muestra')
        <small class="fs-8 text-danger"> * {{$message}}</small>
    @enderror --}}


<fieldset class="field-border col">
    <div class="row">
        <label class="form-label" ><strong>9.2 Tratamiento actual</strong></label>

        <div class="row">
            <label class="col" >Fecha inicio</label>
            <input type="date" name="tratamiento[actual_fecha_inicio]" value="{{old('tratamiento.actual_fecha_inicio')}}" id="" class="col form-control" placeholder="Fecha de inicio del tratamiento" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de inicio del tratamiento">
            @error('tratamiento.actual_fecha_inicio')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror 
        </div>

        <div class="col">
            <label class=" " >Esquema:</label>
           
                <input type="hidden" name="tratamiento[actual_multibacilar]" value="">
                <input class="form-check-input" type="checkbox" name="tratamiento[actual_multibacilar]" value="Si">
                <label class="form-check-label" for="lepromatosa">Multibacilar</label>

                <input type="hidden" name="tratamiento[actual_paucibacilar]" value="">
                <input class="form-check-input" type="checkbox" name="tratamiento[actual_paucibacilar]" value="Si">
                <label class="form-check-label" for="dimofa">Paucibacilar</label>
        </div>
   </div>
</fieldset>