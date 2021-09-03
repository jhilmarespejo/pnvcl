<fieldset class="field-border col">
   <div class="col">
        
        <label class="form-label" ><strong>9.1 Tratamiento anterior por:</strong></label>
        <br>
        <select name="tratamiento[tto_anterior]" id="tto_anterior" class="form-select">
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
   <div class="col mt-1">
        <label class="form-label" >Esquema anterior: </label>

        <input class="esquema-anterior" {{ (old('tratamiento.esquema_anterior') == 'Multibacilar')? 'checked' : '' }}  type="radio" name="tratamiento[esquema_anterior]" value="Multibacilar">
        <label class="form-check-label me-5" for="lepromatosa">Multibacilar </label>

        <input class="esquema-anterior" {{ (old('tratamiento.esquema_anterior') == 'Paucibacilar')? 'checked' : '' }}  type="radio" name="tratamiento[esquema_anterior]" value="Paucibacilar">
        <label class="form-check-label" for="dimofa">Paucibacilar</label>
        @error('tratamiento.esquema_anterior')
            <small class="fs-8 text-danger row ms-1"> * {{$message}}</small>
        @enderror
</fieldset>

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
            <label class=" " >Esquema actual:</label>
           
                <input id="mb" type="radio" name="tratamiento[esquema_actual]" value="Multibacilar" {{ (old('tratamiento.esquema_actual') == 'Multibacilar')? 'checked' : ''}}>
                <label class="me-5">Multibacilar</label>

                <input id="pb" type="radio" name="tratamiento[esquema_actual]" value="Paucibacilar" {{ (old('tratamiento.esquema_actual') == 'Paucibacilar')? 'checked' : ''}}>
                <label>Paucibacilar</label>
                @error('tratamiento.esquema_actual')
                    <small class="fs-8 text-danger row ms-1"> * {{$message}}</small>
                @enderror
        </div>

   </div>
</fieldset>

<script type="text/javaScript">
    $( document ).ready(function() {

        $('#tto_anterior').change(function (e) {
            validate_tto_anterior($('#tto_anterior'));
        });
        document.getElementById("tto_anterior").onload = validate_tto_anterior($('#tto_anterior'));
        function validate_tto_anterior(tag){
            if( tag.val() == 'Ninguno'){
                $('.esquema-anterior').prop("disabled", true);
                $('.esquema-anterior').prop('checked',false);
            } else{
                $('.esquema-anterior').removeAttr('disabled');
            }
        }
    });
</script>