  <div class="">
    <div class="">
      <h5 class="modal-title text-center" id="controlContactosLabel">8. Registro de discapacidades</h5>
      {{ $disability_records }}
    
    </div>
    
      <form method="POST" action="{{ route('discapacidades.update') }}" >
        @csrf
        @method('put')

        <div class="modal-body">
      <div class="container row table-responsive">
        <small id="" class="fs-6 text-danger msg-discapacidad" style="display:none;" > * Debe seleccionar al menos un dato por columna</small>
        <fieldset class="field-border row">
         
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th rowspan="2">Grado</th>
                <th colspan="2">Manos</th>
                <th colspan="2">Pies</th>
                <th colspan="2">Ojos</th>
              </tr>
              <tr>
                <th>Signos</th>
                <th>Lateralidad</th>
                <th>Signos</th>
                <th>Lateralidad</th>
                <th>Signos</th>
                <th>Lateralidad</th>
              </tr>
            </thead>
            <tbody>
              <tr class="g-0" >
                @foreach ($disability_records as $discapacidad)
                  {{-- @if ($discapacidad->manos_signo == 'Sin daños' && $discapacidad->manos_grado == '0') --}}
                    <td> 0 </td>
                    <td>
                      <input type="hidden" name="discapacidad[0][manos_grado]" id="mg_0">
                      <input type="hidden" name="discapacidad[0][manos_signo]" id="ms_0">
                      <span class="fs-6">Sin daños</span>
                    </td>
                    <td> 
                        <select class="form-select form-select-sm lat" id="m_0" name="discapacidad[0][manos_lat]" > 
                          <option value="" selected {{ ($discapacidad->manos_lat == '')? 'selected': '' }}>---</option> 
                          <option value="Derecha" {{ ($discapacidad->manos_lat == 'Derecha')? 'selected': '' }}>Derecha</option> 
                          <option value="Izquierda" {{ ($discapacidad->manos_lat == 'Izquierda')? 'selected': '' }}>Izquierda</option> 
                          <option value="Derecha e Izquierda" {{ ($discapacidad->manos_lat == 'Derecha e Izquierda')? 'selected': '' }}>Derecha e izquierda</option>
                        </select>
                    </td>
                  {{-- @endif
                  @if ($discapacidad->pies_signo == 'Sin daños' && $discapacidad->pies_grado == '0') --}}
                    <td>
                      <input type="hidden" name="discapacidad[0][pies_grado]" id="pg_0">
                      <input type="hidden" name="discapacidad[0][pies_signo]" id="ps_0">
                      <span class="fs-6">Sin daños</span>
                    </td>
                    <td>
                        <select class="form-select form-select-sm lat" id="p_0" name="discapacidad[0][pies_lat]]" > 
                          <option value="" selected {{ ($discapacidad->pies_lat == '')? 'selected': '' }}>---</option> 
                          <option value="Derecha" {{ ($discapacidad->pies_lat == 'Derecha')? 'selected': '' }}>Derecha</option> 
                          <option value="Izquierda" {{ ($discapacidad->pies_lat == 'Izquierda')? 'selected': '' }}>Izquierda</option> 
                          <option value="Derecha e Izquierda" {{ ($discapacidad->pies_lat == 'Derecha e Izquierda')? 'selected': '' }}>Derecha e izquierda</option>
                        </select>
                    </td>
                  {{-- @endif --}}
                  {{-- @if ($discapacidad->ojos_signo == 'Sin daños' && $discapacidad->ojos_grado == '0') --}}
                    <td>
                      <input type="hidden" name="discapacidad[0][ojos_grado]" id="og_0">
                      <input type="hidden" name="discapacidad[0][ojos_signo]" id="os_0">
                      <span class="fs-6">Sin daños</span>
                    </td>
                    <td>
                        <select class="form-select form-select-sm lat" id="o_0" name="discapacidad[0][ojos_lat]]" > 
                          <option value="" selected {{ ($discapacidad->ojos_lat == '')? 'selected': '' }}>---</option> 
                          <option value="Derecha" {{ ($discapacidad->ojos_lat == 'Derecha')? 'selected': '' }}>Derecha</option> 
                          <option value="Izquierda" {{ ($discapacidad->ojos_lat == 'Izquierda')? 'selected': '' }}>Izquierda</option> 
                          <option value="Derecha e Izquierda" {{ ($discapacidad->ojos_lat == 'Derecha e Izquierda')? 'selected': '' }}>Derecha e izquierda</option>
                        </select>
                    </td>
                  {{-- @else --}}
                   {{--  <td>
                      <input type="hidden" name="discapacidad[0][ojos_grado]" id="og_0">
                      <input type="hidden" name="discapacidad[0][ojos_signo]" id="os_0">
                      <span class="fs-6">Sin daños</span>
                    </td>
                    <td>
                        <select class="form-select form-select-sm lat" id="o_0" name="discapacidad[0][ojos_lat]]" > 
                          <option value="" selected {{ ($discapacidad->ojos_lat == '')? 'selected': '' }}>---</option> 
                          <option value="Derecha" {{ ($discapacidad->ojos_lat == 'Derecha')? 'selected': '' }}>Derecha</option> 
                          <option value="Izquierda" {{ ($discapacidad->ojos_lat == 'Izquierda')? 'selected': '' }}>Izquierda</option> 
                          <option value="Derecha e Izquierda" {{ ($discapacidad->ojos_lat == 'Derecha e Izquierda')? 'selected': '' }}>Derecha e izquierda</option>
                        </select>
                    </td> --}}
                  {{-- @endif --}}
                @endforeach
              </tr>
      
             {{--  <tr class="g-1">
                <td>1</td>
                <td>
                  <input type="hidden" name="discapacidad[1][manos_grado]" id="mg_1">
                  <input type="hidden" name="discapacidad[1][manos_signo]" id="ms_1">
                  <span class="fs-6">Insensibilidad</span>
                </td>
                <td> 
                  <select class="form-select form-select-sm lat" id="m_1" name="discapacidad[1][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[1][pies_grado]" id="pg_1">
                  <input type="hidden" name="discapacidad[1][pies_signo]" id="ps_1">
                  <span class="fs-6">Insensibilidad</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="p_1" name="discapacidad[1][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[1][ojos_grado]" id="og_1">
                  <input type="hidden" name="discapacidad[1][ojos_signo]" id="os_1">
                  <span class="fs-6">Enrojecimiento de la conjuntiva</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="o_1" name="discapacidad[1][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
              </tr>
      
              <tr class="g-2">
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[2][manos_grado]" id="mg_2">
                  <input type="hidden" name="discapacidad[2][manos_signo]" id="ms_2">
                  <span class="fs-6">Úlcelas y lesiones traumáticas</span>
                </td>
                <td> 
                  <select class="form-select form-select-sm lat" id="m_2" name="discapacidad[2][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[2][pies_grado]" id="pg_2">
                  <input type="hidden" name="discapacidad[2][pies_signo]" id="ps_2">
                  <span class="fs-6">Mal performante</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="p_2" name="discapacidad[2][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[2][ojos_grado]" id="og_2">
                  <input type="hidden" name="discapacidad[2][ojos_signo]" id="os_2">
                  <span class="fs-6">Iritis o queratitis</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="o_2" name="discapacidad[2][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
              </tr>
      
              <tr class="g-2">
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[3][manos_grado]" id="mg_3">
                  <input type="hidden" name="discapacidad[3][manos_signo]" id="ms_3">
                  <span class="fs-6">Mano en garra movible</span>
                </td>
                <td> 
                  <select class="form-select form-select-sm lat" id="m_3" name="discapacidad[3][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[3][pies_grado]" id="pg_3">
                  <input type="hidden" name="discapacidad[3][pies_signo]" id="ps_3">
                  <span class="fs-6">Dedos en garfio</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="p_3" name="discapacidad[3][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[3][ojos_grado]" id="og_3">
                  <input type="hidden" name="discapacidad[3][ojos_signo]" id="os_3">
                  <span class="fs-6">Visión borrosa</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="o_3" name="discapacidad[3][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
              </tr>
      
      
              <tr class="g-2">
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[4][manos_grado]" id="mg_4">
                  <input type="hidden" name="discapacidad[4][manos_signo]" id="ms_4">
                  <span class="fs-6">Reabsoción leve</span>
                </td>
                <td> 
                  <select class="form-select form-select-sm lat" id="m_4" name="discapacidad[4][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[4][pies_grado]" id="pg_4">
                  <input type="hidden" name="discapacidad[4][pies_signo]" id="ps_4">
                  <span class="fs-6">Pie caido</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="p_4" name="discapacidad[4][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[4][ojos_grado]" id="og_4">
                  <input type="hidden" name="discapacidad[4][ojos_signo]" id="os_4">
                  <span class="fs-6">Pérdida severa de visión</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="o_4" name="discapacidad[4][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
              </tr>
      
              <tr class="g-2"> 
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[5][manos_grado]" id="mg_5">
                  <input type="hidden" name="discapacidad[5][manos_signo]" id="ms_5">
                  <span class="fs-6">Mano caida</span>
                </td>
                <td> 
                  <select class="form-select form-select-sm lat" id="m_5" name="discapacidad[5][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[5][pies_grado]" id="pg_5">
                  <input type="hidden" name="discapacidad[5][pies_signo]" id="ps_5">
                  <span class="fs-6">Reabsoción leve</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="p_5" name="discapacidad[5][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[5][ojos_grado]" id="og_5">
                  <input type="hidden" name="discapacidad[5][ojos_signo]" id="os_5">
                  <span class="fs-6">Ceguera</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="o_5" name="discapacidad[5][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
              </tr>
      
              <tr class="g-2">
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[6][manos_grado]" id="mg_6">
                  <input type="hidden" name="discapacidad[6][manos_signo]" id="ms_6">
                  <span class="fs-6">Articulaciones rígidas</span>
                </td>
                <td> 
                  <select class="form-select form-select-sm lat" id="m_6" name="discapacidad[6][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[6][pies_grado]" id="pg_6">
                  <input type="hidden" name="discapacidad[6][pies_signo]" id="ps_6">
                  <span class="fs-6">Contractura</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="p_6" name="discapacidad[6][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[6][ojos_grado]">
                  <input type="hidden" name="discapacidad[6][ojos_signo]">
                  <input type="hidden" name="discapacidad[6][ojos_lat]]" >
                </td>
                <td>
                  
                </td>
              </tr>
      
              <tr class="g-2">
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[7][manos_grado]" id="mg_7">
                  <input type="hidden" name="discapacidad[7][manos_signo]" id="ms_7">
                  <span class="fs-6">Reabsorción grave</span>
                </td>
                <td> 
                  <select class="form-select form-select-sm lat" id="m_7" name="discapacidad[7][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[7][pies_grado]" id="pg_7">
                  <input type="hidden" name="discapacidad[7][pies_signo]" id="ps_7">
                  <span class="fs-6">Reabsorción grave</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="p_7" name="discapacidad[7][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[7][ojos_grado]">
                  <input type="hidden" name="discapacidad[7][ojos_signo]">
                  <input type="hidden" name="discapacidad[7][ojos_lat]" >
                </td>
                <td>
                  
                </td>
              </tr> --}}
      
            </tbody>
          </table>

          <div class="container row">
            <legend>Otras lesiones:</legend>

            <div class="col">
              <label class="form-label" >Lesiones faringeas </label>
              <select class="form-select form-select-sm" name="discapacidad[8][lesiones_faringeas]" id="">
                <option value="" selected>---</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="col">
              <label class="form-label" >Aplastamiento de la nariz</label>
              <select class="form-select form-select-sm" name="discapacidad[8][aplastamiento_nariz]" id="">
                <option value="" selected>---</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="col">
              <label class="form-label" >Parálisis fasial</label><br>
              <select class="form-select form-select-sm" name="discapacidad[8][paralisis_fasial]" id="">
                <option value="" selected>---</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="col">
              <label class="form-label" >Otros</label><br>
              <input class="form-control" type="text" name="discapacidad[8][otros]" id="">
            </div>

          </div>

        </fieldset>
      </div>
    </div>
        <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg">Actualizar Datos de Histopatología </button>
            </div>
      </form>

  </div>

