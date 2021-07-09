<fieldset class="field-border col">
   <div class="col">
        <input type="hidden" name="tratamiento[datos_personales_id]" value="xxx" >
        <label class="form-label" ><strong>9.1 Traramiento anterior por:</strong></label>
        <br>
        <select name="tratamiento[tto_anterior]" id="" class="form-select">
            <option value="" selected disabled >Seleccione</option>
            <option value="Abandono">Abandono</option>
            <option value="Fracaso terapéutico">Fracaso terapéutico</option>
            <option value="Recaída">Recaída</option>
            <option value="Ninguno">Ninguno</option>
        </select>
   </div>
   <div class="col ">
        <label class="form-label" >Esquema:</label>

        <input type="hidden" name="tratamiento[anterior_multibacilar]" value="No">
        <input class="form-check-input" type="checkbox" name="tratamiento[anterior_multibacilar]" value="Si">
        <label class="form-check-label" for="lepromatosa">Multibacilar</label>


        <input type="hidden" name="tratamiento[anterior_paucibacilar]" value="No">
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
            <input type="date" name="tratamiento[actual_fecha_inicio]" {{--value="{{old('tratamiento.actual_fecha_inicio')}}"--}} id="" class="col form-control" placeholder="Fecha de inicio del tratamiento" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de inicio del tratamiento">
        </div>

        <div class="col">
            <label class=" " >Esquema:</label>
           
                <input type="hidden" name="tratamiento[actual_multibacilar]" value="No">
                <input class="form-check-input" type="checkbox" name="tratamiento[actual_multibacilar]" value="Si">
                <label class="form-check-label" for="lepromatosa">Multibacilar</label>

                <input type="hidden" name="tratamiento[actual_paucibacilar]" value="No">
                <input class="form-check-input" type="checkbox" name="tratamiento[actual_paucibacilar]" value="Si">
                <label class="form-check-label" for="dimofa">Paucibacilar</label>
        </div>
   </div>
</fieldset>