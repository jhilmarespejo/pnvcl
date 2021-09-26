@foreach ($histopatology_records as $histopatology_record)
@endforeach

<form method="POST" action="{{ route('histopatologia.update') }}" >
    @csrf
    @method('put')
    <fieldset class="field-borde col">
        <legend class="field-border">6. Histopatolog&iacute;a (si corresponde o es necesario)</legend>
        <div class="col">
            <input type="hidden" name="histopatologia[datos_personales_id]" value="{{$histopatology_record->datos_personales_id}}">
            <textarea rows="2" class="form-control" name="histopatologia[laboratorio_informe]" id="" class="form-control" placeholder="Laboratorio que realiza el informe" data-bs-toggle="tooltip" data-bs-placement="top" title="Laboratorio que realiza el informe">{{ $histopatology_record->laboratorio_informe }}</textarea>
            @error('histopatologia.laboratorio_informe')
            <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <br>
        <div class="col">
            <textarea rows="2" class="form-control" name="histopatologia[resultado_histopatologico]" id="" class="form-control" placeholder="Resultado histopatológico" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado histopatológico">{{ $histopatology_record->resultado_histopatologico }}</textarea>
            @error('histopatologia.resultado_histopatologico')
            <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>

        <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg">Actualizar Datos de Histopatología </button>
            </div>
    </fieldset>
</form>