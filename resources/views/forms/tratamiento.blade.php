<div class="col">
    <input type="hidden" name="tratamiento[datos_personales_id]" value="xxx" >
    <label class="form-label" >9.1 Traramiento anterior por:</label>
    <input type="date" name="bacteriologia[fecha_muestra]" value="{{old('bacteriologia.fecha_muestra')}}" id="" class="form-control" placeholder="Fecha de toma de muestra" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de toma de muestra">
    @error('bacteriologia.fecha_muestra')
        <small class="fs-8 text-danger"> * {{$message}}</small>
    @enderror
</div>