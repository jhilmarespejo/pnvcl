<fieldset class="field-borde col">
    <legend class="field-border">5. Bacteriología</legend>
    <div class="row">
        <div class="col">
            <input type="date" name="bacteriologia[fecha_muestra]" value="{{old('bacteriologia.fecha_muestra')}}" id="" class="form-control" placeholder="Fecha de toma de muestra" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de toma de muestra">
            @error('bacteriologia.fecha_muestra')
                <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="bacteriologia[laboratorio]" value="{{old('bacteriologia.laboratorio')}}" id="" class="form-control" placeholder="Laboratorio" data-bs-toggle="tooltip" data-bs-placement="top" title="Laboratorio">
            @error('bacteriologia.laboratorio')
            <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col">
            <input type="date" name="bacteriologia[fecha_resultado]" value="{{old('bacteriologia.fecha_resultado')}}" id="" class="form-control" placeholder="Fecha de resultado" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de resultado">
            @error('bacteriologia.fecha_resultado')
            <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="bacteriologia[nombre_tecnico_analisis]" value="{{old('bacteriologia.nombre_tecnico_analisis')}}" id="" class="form-control" placeholder="Nombre del técnico que relizó el analisis" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombre del técnico que relizó el analisis">
            @error('bacteriologia.nombre_tecnico_analisis')
            <small class="fs-8 text-danger"> * {{$message}}</small>
            @enderror
        </div>
        <table class="table table-bordered table-sm mt-2">
            <tr>
                <td colspan="4"><label class="form-label fs-6" ><strong>Linfa obtenida de:</strong></label></td>
            </tr>
            <tr>
                <td>
                    <div class="col">
                        <input type="hidden" name="bacteriologia[linfa_lobulo_oreja]" value="">
                        <input class="form-check-input" type="checkbox" {{ (old('bacteriologia.linfa_lobulo_oreja') == '1') ? 'checked' : '' }} name="bacteriologia[linfa_lobulo_oreja]" value="1">
                        <label class="form-check-label">Lóbulo oreja</label>
                        @error('bacteriologia.linfa_lobulo_oreja')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </td>
                <td>
                    <div class="col">
                        <input type="hidden" name="bacteriologia[linfa_lesion]" value="">
                        <input class="form-check-input" type="checkbox" name="bacteriologia[linfa_lesion]" value="1" {{ (old('bacteriologia.linfa_lesion') == '1') ? 'checked' : '' }}>
                        <label class="form-check-label" >Lesión</label>
                        @error('bacteriologia.linfa_lesion')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </td>
                <td>
                    <div class="col">
                        <input type="hidden" name="bacteriologia[linfa_codo]" value="">
                        <input class="form-check-input" type="checkbox" name="bacteriologia[linfa_codo]" value="1" {{ (old('bacteriologia.linfa_codo') == '1') ? 'checked' : '' }}>
                        <label class="form-check-label" >Codo</label>
                        @error('bacteriologia.linfa_codo')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </td>
                <td>
                    <div class="col float-label">
                        <input type="text" name="bacteriologia[linfa_otro]" value="{{old('bacteriologia.linfa_otro')}}" id="" class=" form-control form-control-sm" placeholder="">
                        <label >Otra región</label>
                        @error('bacteriologia.linfa_otro')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4"><label class="fs-6"><strong>Resultado laboratorial:</strong></label></td>
            </tr>
            <tr>
                <td>
                    <div class="col">
                        <select class="form-select" name="bacteriologia[resultado_lobulo_oreja]" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado: lóbulo de la oreja" class="form-select">
                            <option disabled {{(old('bacteriologia.resultado_lobulo_oreja') == '')? 'selected':'' }}>Resultado: lóbulo de la oreja</option>
                            <option value="(+)" {{(old('bacteriologia.resultado_lobulo_oreja') == '(+)')? 'selected':'' }}>Positivo (+)</option>
                            <option value="(++)" {{(old('bacteriologia.resultado_lobulo_oreja') == '(++)')? 'selected':'' }}>Positivo (++)</option>
                            <option value="(+++)" {{(old('bacteriologia.resultado_lobulo_oreja') == '(+++)')? 'selected':'' }}>Positivo (+++)</option>
                            <option value="(-)" {{(old('bacteriologia.resultado_lobulo_oreja') == '(-)')? 'selected':'' }}>Negativo</option>
                            <option value="Indeterminado" {{(old('bacteriologia.resultado_lobulo_oreja') == 'Indeterminado')? 'selected':'' }}>Indeterminado</option>
                        </select>
                        @error('bacteriologia.resultado_lobulo_oreja')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </td>
                <td>
                    <div class="col">
                        <select class="form-select" name="bacteriologia[resultado_lesion]" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado: Lessión" class="form-select">
                            <option disabled {{(old('bacteriologia.resultado_lesion') == '')? 'selected':'' }}>Resultado: Lessión</option>
                            <option value="(+)" {{(old('bacteriologia.resultado_lesion') == '(+)')? 'selected':'' }}>Positivo (+)</option>
                            <option value="(++)" {{(old('bacteriologia.resultado_lesion') == '(++)')? 'selected':'' }}>Positivo (++)</option>
                            <option value="(+++)" {{(old('bacteriologia.resultado_lesion') == '(+++)')? 'selected':'' }}>Positivo (+++)</option>
                            <option value="(-)" {{(old('bacteriologia.resultado_lesion') == '(-)')? 'selected':'' }}>Negativo</option>
                            <option value="Indeterminado" {{(old('bacteriologia.resultado_lesion') == 'Indeterminado')? 'selected':'' }}>Indeterminado</option>
                        </select>
                        @error('bacteriologia.resultado_lesion')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </td>
                <td>
                    <div class="col">
                        <select class="form-select" name="bacteriologia[resultado_codo]" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado: Codo" class="form-select">
                            <option disabled {{(old('bacteriologia.resultado_codo') == '')? 'selected':'' }}>Resultado: Codo</option>
                            <option value="(+)" {{(old('bacteriologia.resultado_codo') == '(+)')? 'selected':'' }}>Positivo (+)</option>
                            <option value="(++)" {{(old('bacteriologia.resultado_codo') == '(++)')? 'selected':'' }}>Positivo (++)</option>
                            <option value="(+++)" {{(old('bacteriologia.resultado_codo') == '(+++)')? 'selected':'' }}>Positivo (+++)</option>
                            <option value="(-)" {{(old('bacteriologia.resultado_codo') == '(-)')? 'selected':'' }}>Negativo</option>
                            <option value="Indeterminado" {{(old('bacteriologia.resultado_codo') == 'Indeterminado')? 'selected':'' }}>Indeterminado</option>
                        </select>
                        @error('bacteriologia.resultado_codo')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </td>
                <td>
                    <div class="col">
                        <select class="form-select" name="bacteriologia[resultado_otro]" data-bs-toggle="tooltip" data-bs-placement="top" title="Resultado otra región " class="form-select">
                            <option disabled {{(old('bacteriologia.resultado_otro') == '')? 'selected':'' }}>Resultado: Otra región</option>
                            <option value="(+)" {{(old('bacteriologia.resultado_otro') == '(+)')? 'selected':'' }}>Positivo (+)</option>
                            <option value="(++)" {{(old('bacteriologia.resultado_otro') == '(++)')? 'selected':'' }}>Positivo (++)</option>
                            <option value="(+++)" {{(old('bacteriologia.resultado_otro') == '(+++)')? 'selected':'' }}>Positivo (+++)</option>
                            <option value="(-)" {{(old('bacteriologia.resultado_otro') == '(-)')? 'selected':'' }}>Negativo</option>
                            <option value="Indeterminado" {{(old('bacteriologia.resultado_otro') == 'Indeterminado')? 'selected':'' }}>Indeterminado</option>
                        </select>
                        @error('bacteriologia.resultado_otro')
                            <small class="fs-8 text-danger"> * {{$message}}</small>
                        @enderror
                    </div>
                </td>
            </tr>
        </table>
    </div>

</fieldset>

<script type="text/javascript">
    // $('.lymph').mousemove(function(){
    //     validate_lymph();
    // });
    // function validate_lymph(){    
    //     if ( $('.lymph input[type=checkbox]:checked').length==0 ){       
    //         console.log("Indique el material de la cotización o pedido.");
    //        return false;
    //      }
    // }
</script>