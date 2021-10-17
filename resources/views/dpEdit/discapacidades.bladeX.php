<div class="modal-header">
  <h5 class="modal-title text-center" id="controlContactosLabel">8. Registro de discapacidades</h5>
</div>

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
          
          @php
            $manos = array();
            $pies = array();
            $ojos = array();
            $otros = array();
            foreach ($disability_records as $discapacidad){
                $manos = array_merge( [$discapacidad->manos_signo => $discapacidad->manos_lat, 'id' => $discapacidad->id], $manos);
                $pies = array_merge( [$discapacidad->pies_signo => $discapacidad->pies_lat, 'id' => $discapacidad->id], $pies);
                $ojos = array_merge( [$discapacidad->ojos_signo => $discapacidad->ojos_lat, 'id' => $discapacidad->id], $ojos);

                if( $discapacidad->lesiones_faringeas || $discapacidad->aplastamiento_nariz || $discapacidad->paralisis_fasial || $discapacidad->otros) {
                $otros = array_merge( ['lesiones_faringeas' => $discapacidad->lesiones_faringeas, 'aplastamiento_nariz' => $discapacidad->aplastamiento_nariz, 'paralisis_fasial' => $discapacidad->paralisis_fasial, 'otros' => $discapacidad->otros], $otros);
                }
            }
          @endphp
            {{print_r($manos) }} 
           <p></p>
            {{print_r($pies) }}
           <p></p>
            {{print_r($ojos) }}
           <p></p>
            {{print_r($otros) }}
          <form method="POST" action="{{ route('discapacidades.update') }}" >
          @csrf
          @method('put')
            <tr class="g-0" >
              <td> 0 </td>
              <td>
                <input type="hidden" name="discapacidad[0][manos_grado]" id="mg_0" value="{{ (isset($manos['Sin daños']))? '0': '' }}">
                <input type="hidden" name="discapacidad[0][manos_signo]" id="ms_0" value="{{ (isset($manos['Sin daños']))? 'Sin daños': '' }}">
                <span class="fs-6">Sin daños</span>
              </td>
              <td> 
                <select class="form-select form-select-sm lat" id="m_0" name="discapacidad[0][manos_lat]" >
                  <option value="" {{ ( isset($manos['Sin daños']) && $manos['Sin daños'] == '' )? 'selected' :'' }} >---</option> 
                  <option value="Derecha" {{ ( isset($manos['Sin daños']) && $manos['Sin daños'] == 'Derecha' )? 'selected' :'' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($manos['Sin daños']) && $manos['Sin daños'] == 'Izquierda' )? 'selected' :'' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($manos['Sin daños']) && $manos['Sin daños'] == 'Derecha e Izquierda' )? 'selected' :'' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[0][pies_grado]" id="pg_0" value="{{ (isset($pies['Sin daños']))? '0': '' }}">
                <input type="hidden" name="discapacidad[0][pies_signo]" id="ps_0" value="{{ (isset($pies['Sin daños']))? 'Sin daños': '' }}">
                <span class="fs-6">Sin daños</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="p_0" name="discapacidad[0][pies_lat]]" >
                  <option value="" {{ ( isset($pies['Sin daños']) && $pies['Sin daños'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($pies['Sin daños']) && $pies['Sin daños'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($pies['Sin daños']) && $pies['Sin daños'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($pies['Sin daños']) && $pies['Sin daños'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[0][ojos_grado]" id="og_0" value="{{ (isset($ojos['Sin daños']))? '0': '' }}">
                <input type="hidden" name="discapacidad[0][ojos_signo]" id="os_0" value="{{ (isset($ojos['Sin daños']))? 'Sin daños': '' }}">
                <span class="fs-6">Sin daños</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="o_0" name="discapacidad[0][ojos_lat]]" >
                  <option value="" {{ ( isset($ojos['Sin daños']) && $ojos['Sin daños'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($ojos['Sin daños']) && $ojos['Sin daños'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($ojos['Sin daños']) && $ojos['Sin daños'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($ojos['Sin daños']) && $ojos['Sin daños'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
            </tr>

            <tr class="g-1">
              <td>1</td>
              <td>
                <input type="hidden" name="discapacidad[1][manos_grado]" id="mg_1" value="{{ (isset($manos['Insensibilidad']))? '1': '' }}">
                <input type="hidden" name="discapacidad[1][manos_signo]" id="ms_1" value="{{ (isset($manos['Insensibilidad']))? 'Insensibilidad': '' }}">
                <span class="fs-6">Insensibilidad</span>
              </td>
              <td> 
                <select class="form-select form-select-sm lat" id="m_1" name="discapacidad[1][manos_lat]" > 
                  <option value="" {{ ( isset($manos['Insensibilidad']) && $manos['Insensibilidad'] == '' )? 'selected' :'' }} >---</option> 
                  <option value="Derecha" {{ ( isset($manos['Insensibilidad']) && $manos['Insensibilidad'] == 'Derecha' )? 'selected' :'' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($manos['Insensibilidad']) && $manos['Insensibilidad'] == 'Izquierda' )? 'selected' :'' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($manos['Insensibilidad']) && $manos['Insensibilidad'] == 'Derecha e Izquierda' )? 'selected' :'' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[1][pies_grado]" id="pg_1" value="{{ (isset($pies['Insensibilidad']))? '1': '' }}">
                <input type="hidden" name="discapacidad[1][pies_signo]" id="ps_1" value="{{ (isset($pies['Insensibilidad']))? 'Insensibilidad': '' }}">
                <span class="fs-6">Insensibilidad</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="p_1" name="discapacidad[1][pies_lat]]" > 
                  <option value="" {{ ( isset($pies['Insensibilidad']) && $pies['Insensibilidad'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($pies['Insensibilidad']) && $pies['Insensibilidad'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($pies['Insensibilidad']) && $pies['Insensibilidad'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($pies['Insensibilidad']) && $pies['Insensibilidad'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[1][ojos_grado]" id="og_1" value="{{ (isset($ojos['Enrojecimiento de la conjuntiva']))? '1': '' }}">
                <input type="hidden" name="discapacidad[1][ojos_signo]" id="os_1" value="{{ (isset($ojos['Enrojecimiento de la conjuntiva']))? 'Enrojecimiento de la conjuntiva': '' }}">
                <span class="fs-6">Enrojecimiento de la conjuntiva</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="o_1" name="discapacidad[1][ojos_lat]]" > 
                  <option value="" {{ ( isset($ojos['Enrojecimiento de la conjuntiva']) && $ojos['Enrojecimiento de la conjuntiva'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($ojos['Enrojecimiento de la conjuntiva']) && $ojos['Enrojecimiento de la conjuntiva'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($ojos['Enrojecimiento de la conjuntiva']) && $ojos['Enrojecimiento de la conjuntiva'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($ojos['Enrojecimiento de la conjuntiva']) && $ojos['Enrojecimiento de la conjuntiva'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
            </tr>

            <tr class="g-2">
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[2][manos_grado]" id="mg_2" value="{{ (isset($manos['Úlcelas y lesiones traumáticas']))? '2': '' }}">
                  <input type="hidden" name="discapacidad[2][manos_signo]" id="ms_2" value="{{ (isset($manos['Úlcelas y lesiones traumáticas']))? 'Úlcelas y lesiones traumáticas': '' }}">
                  <span class="fs-6">Úlcelas y lesiones traumáticas</span>
                </td>
                <td> 
                  <select class="form-select form-select-sm lat" id="m_2" name="discapacidad[2][manos_lat]" > 
                    <option value="" {{ ( isset($manos['Úlcelas y lesiones traumáticas']) && $manos['Úlcelas y lesiones traumáticas'] == '' )? 'selected' :'' }} >---</option> 
                    <option value="Derecha" {{ ( isset($manos['Úlcelas y lesiones traumáticas']) && $manos['Úlcelas y lesiones traumáticas'] == 'Derecha' )? 'selected' :'' }} >Derecha</option> 
                    <option value="Izquierda" {{ ( isset($manos['Úlcelas y lesiones traumáticas']) && $manos['Úlcelas y lesiones traumáticas'] == 'Izquierda' )? 'selected' :'' }} >Izquierda</option> 
                    <option value="Derecha e Izquierda" {{ ( isset($manos['Úlcelas y lesiones traumáticas']) && $manos['Úlcelas y lesiones traumáticas'] == 'Derecha e Izquierda' )? 'selected' :'' }} >Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[2][pies_grado]" id="pg_2" value="{{ (isset($pies['Mal performante']))? '2': '' }}">
                  <input type="hidden" name="discapacidad[2][pies_signo]" id="ps_2" value="{{ (isset($pies['Mal performante']))? 'Mal performante': '' }}">
                  <span class="fs-6">Mal performante</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="p_2" name="discapacidad[2][pies_lat]]" > 
                    <option value="" {{ ( isset($pies['Mal performante']) && $pies['Mal performante'] == ''  )? 'selected' : '' }} >---</option> 
                    <option value="Derecha" {{ ( isset($pies['Mal performante']) && $pies['Mal performante'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                    <option value="Izquierda" {{ ( isset($pies['Mal performante']) && $pies['Mal performante'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                    <option value="Derecha e Izquierda" {{ ( isset($pies['Mal performante']) && $pies['Mal performante'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[2][ojos_grado]" id="og_2" value="{{ (isset($ojos['Iritis o queratitis']))? '2': '' }}">
                  <input type="hidden" name="discapacidad[2][ojos_signo]" id="os_2" value="{{ (isset($ojos['Iritis o queratitis']))? 'Iritis o queratitis': '' }}">
                  <span class="fs-6">Iritis o queratitis</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="o_2" name="discapacidad[2][ojos_lat]]" > 
                    <option value="" {{ ( isset($ojos['Iritis o queratitis']) && $ojos['Iritis o queratitis'] == ''  )? 'selected' : '' }} >---</option> 
                    <option value="Derecha" {{ ( isset($ojos['Iritis o queratitis']) && $ojos['Iritis o queratitis'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                    <option value="Izquierda" {{ ( isset($ojos['Iritis o queratitis']) && $ojos['Iritis o queratitis'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                    <option value="Derecha e Izquierda" {{ ( isset($ojos['Iritis o queratitis']) && $ojos['Iritis o queratitis'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                  </select>
                </td>
            </tr>

            <tr class="g-2">
              <td>2</td>
              <td>
                <input type="hidden" name="discapacidad[3][manos_grado]" id="mg_3" value="{{ (isset($manos['Mano en garra movible']))? '2': '' }}">
                <input type="hidden" name="discapacidad[3][manos_signo]" id="ms_3" value="{{ (isset($manos['Mano en garra movible']))? 'Mano en garra movible': '' }}">
                <span class="fs-6">Mano en garra movible</span>
              </td>
              <td> 
                <select class="form-select form-select-sm lat" id="m_3" name="discapacidad[3][manos_lat]" > 
                  <option value="" {{ ( isset($manos['Mano en garra movible']) && $manos['Mano en garra movible'] == '' )? 'selected' :'' }} >---</option> 
                  <option value="Derecha" {{ ( isset($manos['Mano en garra movible']) && $manos['Mano en garra movible'] == 'Derecha' )? 'selected' :'' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($manos['Mano en garra movible']) && $manos['Mano en garra movible'] == 'Izquierda' )? 'selected' :'' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($manos['Mano en garra movible']) && $manos['Mano en garra movible'] == 'Derecha e Izquierda' )? 'selected' :'' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[3][pies_grado]" id="pg_3" value="{{ (isset($pies['Dedos en garfio']))? '2': '' }}">
                <input type="hidden" name="discapacidad[3][pies_signo]" id="ps_3" value="{{ (isset($pies['Dedos en garfio']))? 'Dedos en garfio': '' }}">
                <span class="fs-6">Dedos en garfio</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="p_3" name="discapacidad[3][pies_lat]]" > 
                  <option value="" {{ ( isset($pies['Dedos en garfio']) && $pies['Dedos en garfio'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($pies['Dedos en garfio']) && $pies['Dedos en garfio'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($pies['Dedos en garfio']) && $pies['Dedos en garfio'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($pies['Dedos en garfio']) && $pies['Dedos en garfio'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[3][ojos_grado]" id="og_3" value="{{ (isset($ojos['Visión borrosa']))? '2': '' }}">
                <input type="hidden" name="discapacidad[3][ojos_signo]" id="os_3" value="{{ (isset($ojos['Visión borrosa']))? 'Visión borrosa': '' }}">
                <span class="fs-6">Visión borrosa</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="o_3" name="discapacidad[3][ojos_lat]]" > 
                  <option value="" {{ ( isset($ojos['Visión borrosa']) && $ojos['Visión borrosa'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($ojos['Visión borrosa']) && $ojos['Visión borrosa'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($ojos['Visión borrosa']) && $ojos['Visión borrosa'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($ojos['Visión borrosa']) && $ojos['Visión borrosa'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
            </tr>

            <tr class="g-2">
              <td>2</td>
              <td>
                <input type="hidden" name="discapacidad[4][manos_grado]" id="mg_4"  value="{{ (isset($manos['Reabsoción leve']))? '2': '' }}">
                <input type="hidden" name="discapacidad[4][manos_signo]" id="ms_4"  value="{{ (isset($manos['Reabsoción leve']))? 'Reabsoción leve': '' }}">
                <span class="fs-6">Reabsoción leve</span>
              </td>
              <td> 
                <select class="form-select form-select-sm lat" id="m_4" name="discapacidad[4][manos_lat]" > 
                  <option value="" {{ ( isset($manos['Reabsoción leve']) && $manos['Reabsoción leve'] == '' )? 'selected' :'' }} >---</option> 
                  <option value="Derecha" {{ ( isset($manos['Reabsoción leve']) && $manos['Reabsoción leve'] == 'Derecha' )? 'selected' :'' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($manos['Reabsoción leve']) && $manos['Reabsoción leve'] == 'Izquierda' )? 'selected' :'' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($manos['Reabsoción leve']) && $manos['Reabsoción leve'] == 'Derecha e Izquierda' )? 'selected' :'' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[4][pies_grado]" id="pg_4"  value="{{ (isset($pies['Pie caido']))? '2': '' }}">
                <input type="hidden" name="discapacidad[4][pies_signo]" id="ps_4"  value="{{ (isset($pies['Pie caido']))? 'Pie caido': '' }}">
                <span class="fs-6">Pie caido</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="p_4" name="discapacidad[4][pies_lat]]" > 
                  <option value="" {{ ( isset($pies['Pie caido']) && $pies['Pie caido'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($pies['Pie caido']) && $pies['Pie caido'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($pies['Pie caido']) && $pies['Pie caido'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($pies['Pie caido']) && $pies['Pie caido'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[4][ojos_grado]" id="og_4"  value="{{ (isset($ojos['Pérdida severa de visión']))? '2': '' }}">
                <input type="hidden" name="discapacidad[4][ojos_signo]" id="os_4"  value="{{ (isset($ojos['Pérdida severa de visión']))? 'Pérdida severa de visión': '' }}">
                <span class="fs-6">Pérdida severa de visión</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="o_4" name="discapacidad[4][ojos_lat]]" > 
                  <option value="" {{ ( isset($ojos['Pérdida severa de visión']) && $ojos['Pérdida severa de visión'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($ojos['Pérdida severa de visión']) && $ojos['Pérdida severa de visión'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($ojos['Pérdida severa de visión']) && $ojos['Pérdida severa de visión'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($ojos['Pérdida severa de visión']) && $ojos['Pérdida severa de visión'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
            </tr>

            <tr class="g-2"> 
              <td>2</td>
              <td>
                <input type="hidden" name="discapacidad[5][manos_grado]" id="mg_5" value="{{ (isset($manos['Mano caida']))? '2': '' }}">
                <input type="hidden" name="discapacidad[5][manos_signo]" id="ms_5" value="{{ (isset($manos['Mano caida']))? 'Mano caida': '' }}">
                <span class="fs-6">Mano caida</span>
              </td>
              <td> 
                <select class="form-select form-select-sm lat" id="m_5" name="discapacidad[5][manos_lat]" > 
                  <option value="" {{ ( isset($manos['Mano caida']) && $manos['Mano caida'] == '' )? 'selected' :'' }} >---</option> 
                  <option value="Derecha" {{ ( isset($manos['Mano caida']) && $manos['Mano caida'] == 'Derecha' )? 'selected' :'' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($manos['Mano caida']) && $manos['Mano caida'] == 'Izquierda' )? 'selected' :'' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($manos['Mano caida']) && $manos['Mano caida'] == 'Derecha e Izquierda' )? 'selected' :'' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[5][pies_grado]" id="pg_5" value="{{ (isset($pies['Reabsoción leve']))? '2': '' }}">
                <input type="hidden" name="discapacidad[5][pies_signo]" id="ps_5" value="{{ (isset($pies['Reabsoción leve']))? 'Reabsoción leve': '' }}">
                <span class="fs-6">Reabsoción leve</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="p_5" name="discapacidad[5][pies_lat]]" > 
                  <option value="" {{ ( isset($pies['Reabsoción leve']) && $pies['Reabsoción leve'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($pies['Reabsoción leve']) && $pies['Reabsoción leve'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($pies['Reabsoción leve']) && $pies['Reabsoción leve'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($pies['Reabsoción leve']) && $pies['Reabsoción leve'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[5][ojos_grado]" id="og_5" value="{{ (isset($ojos['Ceguera']))? '2': '' }}">
                <input type="hidden" name="discapacidad[5][ojos_signo]" id="os_5" value="{{ (isset($ojos['Ceguera']))? 'Ceguera': '' }}">
                <span class="fs-6">Ceguera</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="o_5" name="discapacidad[5][ojos_lat]]" > 
                  <option value="" {{ ( isset($ojos['Ceguera']) && $ojos['Ceguera'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($ojos['Ceguera']) && $ojos['Ceguera'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($ojos['Ceguera']) && $ojos['Ceguera'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($ojos['Ceguera']) && $ojos['Ceguera'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
            </tr>

            <tr class="g-2">
              <td>2</td>
              <td>
                <input type="hidden" name="discapacidad[6][manos_grado]" id="mg_6" value="{{ (isset($manos['Articulaciones rígidas']))? '2': '' }}">
                <input type="hidden" name="discapacidad[6][manos_signo]" id="ms_6" value="{{ (isset($manos['Articulaciones rígidas']))? 'Articulaciones rígidas': '' }}">
                <span class="fs-6">Articulaciones rígidas</span>
              </td>
              <td> 
                <select class="form-select form-select-sm lat" id="m_6" name="discapacidad[6][manos_lat]" > 
                  <option value="" {{ ( isset($manos['Articulaciones rígidas']) && $manos['Articulaciones rígidas'] == '' )? 'selected' :'' }} >---</option> 
                  <option value="Derecha" {{ ( isset($manos['Articulaciones rígidas']) && $manos['Articulaciones rígidas'] == 'Derecha' )? 'selected' :'' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($manos['Articulaciones rígidas']) && $manos['Articulaciones rígidas'] == 'Izquierda' )? 'selected' :'' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($manos['Articulaciones rígidas']) && $manos['Articulaciones rígidas'] == 'Derecha e Izquierda' )? 'selected' :'' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[6][pies_grado]" id="pg_6" value="{{ (isset($pies['Contractura']))? '2': '' }}">
                <input type="hidden" name="discapacidad[6][pies_signo]" id="ps_6" value="{{ (isset($pies['Contractura']))? 'Contractura': '' }}">
                <span class="fs-6">Contractura</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="p_6" name="discapacidad[6][pies_lat]]" > 
                  <option value="" {{ ( isset($pies['Contractura']) && $pies['Contractura'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($pies['Contractura']) && $pies['Contractura'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($pies['Contractura']) && $pies['Contractura'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($pies['Contractura']) && $pies['Contractura'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
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
                <input type="hidden" name="discapacidad[7][manos_grado]" id="mg_7" value="{{ (isset($manos['Reabsorción grave']))? '2': '' }}">
                <input type="hidden" name="discapacidad[7][manos_signo]" id="ms_7" value="{{ (isset($manos['Reabsorción grave']))? 'Reabsorción grave': '' }}">
                <span class="fs-6">Reabsorción grave</span>
              </td>
              <td> 
                <select class="form-select form-select-sm lat" id="m_7" name="discapacidad[7][manos_lat]" > 
                  <option value="" {{ ( isset($manos['Reabsorción grave']) && $manos['Reabsorción grave'] == '' )? 'selected' :'' }} >---</option> 
                  <option value="Derecha" {{ ( isset($manos['Reabsorción grave']) && $manos['Reabsorción grave'] == 'Derecha' )? 'selected' :'' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($manos['Reabsorción grave']) && $manos['Reabsorción grave'] == 'Izquierda' )? 'selected' :'' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($manos['Reabsorción grave']) && $manos['Reabsorción grave'] == 'Derecha e Izquierda' )? 'selected' :'' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[7][pies_grado]" id="pg_7" value="{{ (isset($pies['Reabsorción grave']))? '2': '' }}">
                <input type="hidden" name="discapacidad[7][pies_signo]" id="ps_7" value="{{ (isset($pies['Reabsorción grave']))? 'Reabsorción grave': '' }}">
                <span class="fs-6">Reabsorción grave</span>
              </td>
              <td>
                <select class="form-select form-select-sm lat" id="p_7" name="discapacidad[7][pies_lat]]" > 
                  <option value="" {{ ( isset($pies['Reabsorción grav']) && $pies['Reabsorción grav'] == ''  )? 'selected' : '' }} >---</option> 
                  <option value="Derecha" {{ ( isset($pies['Reabsorción grav']) && $pies['Reabsorción grav'] == 'Derecha'  )? 'selected' : '' }} >Derecha</option> 
                  <option value="Izquierda" {{ ( isset($pies['Reabsorción grav']) && $pies['Reabsorción grav'] == 'Izquierda'  )? 'selected' : '' }} >Izquierda</option> 
                  <option value="Derecha e Izquierda" {{ ( isset($pies['Reabsorción grav']) && $pies['Reabsorción grav'] == 'Derecha e Izquierda'  )? 'selected' : '' }} >Derecha e izquierda</option>
                </select>
              </td>
              <td>
                <input type="hidden" name="discapacidad[7][ojos_grado]">
                <input type="hidden" name="discapacidad[7][ojos_signo]">
                <input type="hidden" name="discapacidad[7][ojos_lat]" >
              </td>
              <td>

              </td>
            </tr>
        
        </tbody>
      </table>

      <div class="container row">
        <legend>Otras lesiones:</legend>

        <div class="col">
          <label class="form-label" >Lesiones faringeas </label>
          <select class="form-select form-select-sm" name="discapacidad[8][lesiones_faringeas]" id="">
            <option value="" {{ ($otros['lesiones_faringeas'] == '')? 'selected' : '' }} >---</option>
            <option value="Si" {{ ($otros['lesiones_faringeas'] == 'Si')? 'selected' : '' }} >Si</option>
            <option value="No" {{ ($otros['lesiones_faringeas'] == 'No')? 'selected' : '' }} >No</option>
          </select>
        </div>
        <div class="col">
          <label class="form-label" >Aplastamiento de la nariz</label>
          <select class="form-select form-select-sm" name="discapacidad[8][aplastamiento_nariz]" id="">
            <option value="" {{ ($otros['aplastamiento_nariz'] == '')? 'selected' : '' }}>---</option>
            <option value="Si" {{ ($otros['aplastamiento_nariz'] == 'Si')? 'selected' : '' }}>Si</option>
            <option value="No" {{ ($otros['aplastamiento_nariz'] == 'No')? 'selected' : '' }}>No</option>
          </select>
        </div>
        <div class="col">
          <label class="form-label" >Parálisis fasial</label><br>
          <select class="form-select form-select-sm" name="discapacidad[8][paralisis_fasial]" id="">
            <option value="" {{ ($otros['paralisis_fasial'] == '' )? 'selected' :'' }} >---</option>
            <option value="Si" {{ ($otros['paralisis_fasial'] == 'Si' )? 'selected' :'' }} >Si</option>
            <option value="No" {{ ($otros['paralisis_fasial'] == 'No' )? 'selected' :'' }} >No</option>
          </select>
        </div>
        <div class="col">
          <label class="form-label" >Otros</label><br>
          <input class="form-control" type="text" name="discapacidad[8][otros]" id="" value="{{$otros['otros']}}">
        </div>

      </div>

    </fieldset>
   <div class="text-center mt-4">
        <button type="submit" class="btn btn-success btn-lg">Actualizar Datos de Discapacidades </button>
    </div>
  </div>
</div>
  </form>
<script type="text/javascript">

  // function chekValues(signo, grado){

  //   alert(signo);
  //   console.log(grado);
  // }

  $('.lat').change(function (e) {
    e.preventDefault();

    var i = event.target.id.toString().split("_");
    var signo = $(this).parent().prev('td').text();
      if(i[1] >= '2'){
        var grado = 2;
      } else {
        var grado = i[1];
      }
    $('#'+i[0]+'g_'+i[1]).val(grado);
    $('#'+i[0]+'s_'+i[1]).val(signo.trim());

  });

  // $('#discapacidades').bind('hide.bs.modal', function(e){ 
  //   return validate();
  // });  

  function validate(){
    var key =false;
    $('table tr td:nth-child(3) select').each(function(e){
      if( $(this).val() ){
        $('table tr td:nth-child(5) select').each(function(e){
          if( $(this).val() ){
            $('table tr td:nth-child(7) select').each(function(e){
              if( $(this).val() ){
                key = true;
              } else {
                $('.msg-discapacidad').css("display", "flex");
              }    
            });
          } else {
                $('.msg-discapacidad').css("display", "flex");
              }        
        });
      } 
      else {
              $('.msg-discapacidad').css("display", "flex");
            }       
    });
                
    if( key ) {$('.msg-discapacidad').css("display", "none");}
    return key;
  }

  // $('.modal-dialog').mousemove(function(e){
  //       // if( !$('select.lat').val() ){
  //       //   console.log('vacio');
  //       // }else{
  //       //   console.log('ok');
  //       //   $('#btn_save_discap').removeClass("disabled");
  //       //   // $('#msg_contactos').removeClass("invisible");
  //       // }
  //       $('select.lat').each(function(){
  //         if( !$(this).val() ){
  //             //$('#btn_save_discap').addClass("disabled");
  //             //console.log('vacio');
  //             // $(this).addClass('fs-4');
  //           }else{
  //             // $(this).removeClass('fs-4');
  //             //console.log('ok');
  //             //$('#btn_save_discap').removeClass("disabled");
  //         }
  //       }); 
  //   });


        // $('select.lat').each(function(){
        //   //console.log($(this).val());
        //   if( $(this).val() == '' ){
        //       $('#discapacidades').bind('hide.bs.modal', function(e){ return false;});
        //     }else{
        //       $('#discapacidades').bind('hide.bs.modal', function(e){ return true;});
        //   }
        // }); 
  
</script>
 
                