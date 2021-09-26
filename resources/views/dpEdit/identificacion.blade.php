    
    @foreach ($identification_records as $identificacion_caso)
    @endforeach
<form method="POST" action="{{ route('identificacioncaso.update') }}" >
@csrf
@method('put')
    <fieldset class="field-border row">
        <input type="hidden" name="identificacion_caso[datos_personales_id]" value="{{  $identificacion_caso->datos_personales_id }}">
        <legend class="field-border ">10. Identificación de caso</legend>
        <div class="row">
            <label class="col">10.1 Vigilacia activa</label>
            <select name="identificacion_caso[activa]" class="form-select col" id="activa" >
                <option value="" {{ ($identificacion_caso->activa == '')? 'selected':'' }}>Seleccione</option>
                <option value="Casa por casa" {{ ($identificacion_caso->activa == 'Casa por casa')? 'selected':'' }}>Casa por casa</option>
                <option value="Campaña" {{ ($identificacion_caso->activa == 'Campaña')? 'selected':'' }}>Campaña</option>
            </select>
            @error('identificacion_caso.activa')
            <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="row">
            <label class="col">10.2 Vigilacia Pasiva</label>
            <input type="hidden" name="identificacion_caso[pasiva]" value="">
            <input class="form-check-input" id="pasiva" type="checkbox" name="identificacion_caso[pasiva]" value="En servicio de salud" {{ ($identificacion_caso->pasiva == 'En servicio de salud')? 'checked':'' }}>
            <label class="form-check-label col">En servicio de salud</label>
            @error('identificacion_caso.pasiva')
            <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="row">
            <label class="col">10.3 Transferencia</label>
            <input type="hidden" name="identificacion_caso[transferencia]" value="">
            <input class="form-check-input" id="transferencia" type="checkbox" name="identificacion_caso[transferencia]" value="Referido" {{ ($identificacion_caso->transferencia == 'Referido')? 'checked':'' }}>
            <label class="form-check-label col">Referido</label>
            @error('identificacion_caso.transferencia')
            <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
    </fieldset>
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-success btn-lg">Actualizar Datos de Identificación de caso </button>
    </div>
</form>

<script type="text/javaScript">
$( document ).ready(function() {


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