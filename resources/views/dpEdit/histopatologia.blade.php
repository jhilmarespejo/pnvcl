 <fieldset class="field-borde col">
                <legend class="field-border">6. Histopatolog&iacute;a (si corresponde o es necesario)</legend>
                <div class="col">
                    <textarea rows="2" class="form-control" name="histopatologia[laboratorio_informe]" id="" class="form-control" placeholder="Laboratorio que realiza el informe" data-bs-toggle="tooltip" data-bs-placement="top" title="Laboratorio que realiza el informe">{{old('histopatologia.laboratorio_informe')}}</textarea>
                    @error('histopatologia.laboratorio_informe')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror

                </div>
                <br>
                <div class="col">
                    <textarea rows="2" class="form-control" name="histopatologia[resultado_histopatologico]" id="" class="form-control" placeholder="Resultado histopatológico" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado histopatológico">{{old('histopatologia.resultado_histopatologico')}}</textarea>
                    @error('histopatologia.resultado_histopatologico')
                        <small class="fs-8 text-danger"> * {{$message}}</small>
                    @enderror
                </div>
            </fieldset>