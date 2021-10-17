
        {{-- {{ $diagnostic_records }} --}}
        @foreach ($diagnostic_records as $diagnostico) @endforeach

<div class="container-xxl mt-3 ">
    <form method="POST" action="{{ route('diagnostico.update') }}" >
    @csrf
    @method('put')
        <fieldset class="field-border row">
            <legend class="field-border">7. Diagnóstico clínico</legend>
            <fieldset class="field-border col">
                <legend class="fs-6">7.1. Clasificación clínica</legend>
                <div class="row">
                    <div class="row">
                        <label for="" class="col">Fecha de diagnóstico</label>
                        <input type="hidden" name="diagnostico[datos_personales_id]" value="{{$diagnostico->datos_personales_id}}">
                        <input type="date" name="diagnostico[fecha_diagnostico]" value="{{$diagnostico->fecha_diagnostico}}"data-bs-toggle="tooltip" data-bs-placement="top" id="search" class="form-control col" placeholder="Fecha de diagnóstico" title="Fecha de diagnóstico">
                            @error('diagnostico.fecha_diagnostico')
                                <small class="fs-8 text-danger text-end"> * {{$message}}</small>
                            @enderror
                    </div>
                    <div class="col">
                        <strong class="">Multibacilar</strong>
                        <div class="mt-3">
                            <input class="form-check-input" id="ll" type="radio" name="diagnostico[diagnostico]" value="Lepra Lepromatosa" {{ ($diagnostico->diagnostico == 'Lepra Lepromatosa')? 'checked' : '' }}>
                            <label class="form-check-label">Lepra Lepromatosa</label>
                            
                            <br>
                            
                            <input class="form-check-input" id="ld" type="radio" name="diagnostico[diagnostico]" value="Lepra Dimofa" {{ ($diagnostico->diagnostico == 'Lepra Dimofa')? 'checked' : '' }}>
                            <label class="form-check-label" >Lepra Dimofa</label>
                        </div>
                    </div>
                    <div class="col">
                        <strong class="">Paucibacilar</strong>
                        <div class="mt-3">
                            <input class="form-check-input" id="lt" type="radio" name="diagnostico[diagnostico]" value="Lepra Tuberculoide" {{ ($diagnostico->diagnostico == 'Lepra Tuberculoide')? 'checked' : '' }}>
                            <label class="form-check-label" >Lepra Tuberculoide</label>
                            
                            <br>

                            <input class="form-check-input" id="li" type="radio" name="diagnostico[diagnostico]" value="Lepra Indeterminada" {{ ($diagnostico->diagnostico == 'Lepra Indeterminada')? 'checked' : '' }}>
                            <label class="form-check-label" >Lepra Indeterminada</label>
                        </div>
                    </div>
                    <div class="row">
                        @error('diagnostico.diagnostico')
                                <small class="fs-8 text-danger"> * {{$message}}</small>
                            @enderror
                    </div>

                </div>

            </fieldset>

            <fieldset class="field-border col">
                <legend class="fs-6">7.2. Localizacion de las lesiones cutáneas y nerviosas</legend>
                    <div class="row mb-2">
                        <div class="col"> 
                            <textarea name="diagnostico[cabeza]" id="" cols="30" rows="1" id=""  data-bs-toggle="tooltip" data-bs-placement="top" title="Cabeza" placeholder="Cabeza">{{$diagnostico->cabeza}}</textarea><br>
                            @error('diagnostico.cabeza')
                                <small class="col fs-8 text-danger"> * {{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="col"> 
                            <textarea name="diagnostico[tronco]" id="" cols="30" rows="1" id="" data-bs-toggle="tooltip" data-bs-placement="top" title="Tronco" placeholder="Tronco">{{$diagnostico->tronco}}</textarea><br>
                            @error('diagnostico.tronco')
                                <small class="col fs-8 text-danger"> * {{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col"> 
                            <textarea name="diagnostico[ext_superiores]" id="" cols="30" rows="1"  data-bs-toggle="tooltip" data-bs-placement="top" title="Extremidades superiores" placeholder="Extremidades superiores">{{$diagnostico->ext_superiores}}</textarea><br>
                            @error('diagnostico.ext_superiores')
                                <small class="col fs-8 text-danger"> * {{$message}}</small>
                            @enderror
                        </div>
                        <div class="col"> 
                            <textarea name="diagnostico[ext_inferiores]" id="" cols="30" rows="1"  data-bs-toggle="tooltip" data-bs-placement="top" title="Extremidades inferiores" placeholder="Extremidades inferiores">{{$diagnostico->ext_inferiores}}</textarea><br>
                            @error('diagnostico.ext_inferiores')
                                <small class="col fs-8 text-danger"> * {{$message}}</small>
                            @enderror
                        </div>
                    </div>
            </fieldset>
        </fieldset>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg">Actualizar Datos de Diagnóstico Clínico </button>
        </div>
    </form>
</div>
<script type="text/javascript">
$( document ).ready(function() {
    $('#ll, #ld').click(function(){
        $('#mb').prop('checked',true);
    });
    $('#lt, #li').click(function(){
        $('#pb').prop('checked',true);
    });
});
</script>
       