<div class="container row mt-3 ">
    <fieldset class="field-border row">
        <legend class="field-border">7. Diagnóstico clínico</legend>
        <fieldset class="field-border col">
            <legend class="fs-6">7.1. Clasificación clínica</legend>
            <div class="row">
                <div class="col">
                    <strong class="">Multibacilar</strong>
                    <div class="mt-3">
                        <input type="hidden" name="diagnostico[multibacilar_lepromatosa]" value="No">
                        <input class="form-check-input" type="checkbox" name="diagnostico[multibacilar_lepromatosa]" value="Si">
                        <label class="form-check-label" for="lepromatosa">Lepra lepromatosa</label>
                        
                        <br>
                        
                        <input type="hidden" name="diagnostico[multibacilar_dimofa]" value="No">
                        <input class="form-check-input" type="checkbox" name="diagnostico[multibacilar_dimofa]" value="Si">
                        <label class="form-check-label" for="dimofa">Lepra dimofa</label>
                    </div>
                </div>
                <div class="col">
                    <strong class="">Paucibacilar</strong>
                    <div class="mt-3">
                        <input type="hidden" name="diagnostico[paucibacilar_tuberculoide]" value="No">
                        <input class="form-check-input" type="checkbox" name="diagnostico[paucibacilar_tuberculoide]" value="Si">
                        <label class="form-check-label" for="lepromatosa">Lepra lepromatosa</label>
                        
                        <br>
                        
                        <input type="hidden" name="diagnostico[paucibacilar_indeterminada]" value="No">
                        <input class="form-check-input" type="checkbox" name="diagnostico[paucibacilar_indeterminada]" value="Si">
                        <label class="form-check-label" for="dimofa">Lepra dimofa</label>
                    </div>
                </div>
            </div>

        </fieldset>

        <fieldset class="field-border col">
            <legend class="fs-6">7.2. Localizacion de las lesiones cutáneas y nerviosas</legend>
                <div class="row mb-2">
                    <div class="col"> 
                        <textarea name="diagnostico[cabeza]" id="" cols="23" rows="1" id=""  data-bs-toggle="tooltip" data-bs-placement="top" title="Cabeza" placeholder="Cabeza">{{old('diagnostico.cabeza')}}</textarea>
                        @error('diagnostico.cabeza')
                            <small class="col fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                    
                    &NonBreakingSpace;
                    <div class="col"> 
                        <textarea name="diagnostico[tronco]" id="" cols="23" rows="1" id="" data-bs-toggle="tooltip" data-bs-placement="top" title="Tronco" placeholder="Tronco">{{old('diagnostico.tronco')}}</textarea>
                        @error('diagnostico.tronco')
                            <small class="col fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col"> 
                        <textarea name="diagnostico[ext_superiores]" id="" cols="23" rows="1"  data-bs-toggle="tooltip" data-bs-placement="top" title="Extremidades superiores" placeholder="Extremidades superiores">{{old('diagnostico.ext_superiores')}}</textarea>
                        @error('diagnostico.ext_superiores')
                            <small class="col fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                    &NonBreakingSpace;
                    <div class="col"> 
                        <textarea name="diagnostico[ext_inferiores]" id="" cols="23" rows="1"  data-bs-toggle="tooltip" data-bs-placement="top" title="Extremidades inferiores" placeholder="Extremidades inferiores">{{old('diagnostico.ext_inferiores')}}</textarea>
                        @error('diagnostico.ext_inferiores')
                            <small class="col fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </div>
        </fieldset>
    </fieldset>
</div>