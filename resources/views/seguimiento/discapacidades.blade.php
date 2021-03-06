<div class="modal-dialog modal-xl" id="discap_container">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title text-center" id="controlContactosLabel">7. Registro de discapacidades al FINAL DEL TRATAMIENTO</h5>
     
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
     
    <div class="modal-body">
      <div class="container row table-responsive">
        <small id="" class="fs-6 text-danger msg-discapacidad" style="display:none;" > * Debe seleccionar al menos un dato por columna</small>
        <fieldset class="field-border row" id="discapacidades_tb">
         
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
                <td>
                  <input type="hidden" name="discapacidad[0][termino_tto]" value="Si">
                  <input type="hidden" name="discapacidad[0][numero_control]" value="{{$numero_control}}">
                   0 
                </td>
                <td>
                  <input type="hidden" name="discapacidad[0][manos_grado]" id="mg_0" value="0">
                  <input type="hidden" name="discapacidad[0][manos_signo]" id="ms_0" value="Sin daños">
                  <span class="fs-6">Sin daños</span>
                </td>
                <td> 
                  <select class="form-select form-select-sm lat" id="m_0" name="discapacidad[0][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[0][pies_grado]" id="pg_0" value="0">
                  <input type="hidden" name="discapacidad[0][pies_signo]" id="ps_0" value="Sin daños">
                  <span class="fs-6">Sin daños</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="p_0" name="discapacidad[0][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[0][ojos_grado]" id="og_0" value="0">
                  <input type="hidden" name="discapacidad[0][ojos_signo]" id="os_0" value="Sin daños">
                  <span class="fs-6">Sin daños</span>
                </td>
                <td>
                  <select class="form-select form-select-sm lat" id="o_0" name="discapacidad[0][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="Derecha">Derecha</option> 
                    <option value="Izquierda">Izquierda</option> 
                    <option value="Derecha e Izquierda">Derecha e izquierda</option>
                  </select>
                </td>
              </tr>
      
              <tr class="g-1">
                <td>
                  <input type="hidden" name="discapacidad[1][termino_tto]" value="Si">
                  <input type="hidden" name="discapacidad[1][numero_control]" value="{{$numero_control}}">
                  1
                </td>
                <td>
                  <input type="hidden" name="discapacidad[1][manos_grado]" id="mg_1" value="1">
                  <input type="hidden" name="discapacidad[1][manos_signo]" id="ms_1" value="Insensibilidad">
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
                  <input type="hidden" name="discapacidad[1][pies_grado]" id="pg_1" value="1">
                  <input type="hidden" name="discapacidad[1][pies_signo]" id="ps_1" value="Insensibilidad">
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
                  <input type="hidden" name="discapacidad[1][ojos_grado]" id="og_1" value="1">
                  <input type="hidden" name="discapacidad[1][ojos_signo]" id="os_1" value="Enrojecimiento de la conjuntiva">
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
                <td>
                  <input type="hidden" name="discapacidad[2][termino_tto]" value="Si">
                  <input type="hidden" name="discapacidad[2][numero_control]" value="{{$numero_control}}">
                  2
                </td>
                <td>
                  <input type="hidden" name="discapacidad[2][manos_grado]" id="mg_2" value="2">
                  <input type="hidden" name="discapacidad[2][manos_signo]" id="ms_2" value="Úlcelas y lesiones traumáticas">
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
                  <input type="hidden" name="discapacidad[2][pies_grado]" id="pg_2" value="2">
                  <input type="hidden" name="discapacidad[2][pies_signo]" id="ps_2" value="Mal performante">
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
                  <input type="hidden" name="discapacidad[2][ojos_grado]" id="og_2" value="2">
                  <input type="hidden" name="discapacidad[2][ojos_signo]" id="os_2" value="Iritis o queratitis">
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
                <td>
                  <input type="hidden" name="discapacidad[3][termino_tto]" value="Si">
                  <input type="hidden" name="discapacidad[3][numero_control]" value="{{$numero_control}}">
                  2
                </td>
                <td>
                  <input type="hidden" name="discapacidad[3][manos_grado]" id="mg_3" value="2">
                  <input type="hidden" name="discapacidad[3][manos_signo]" id="ms_3" value="Mano en garra movible">
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
                  <input type="hidden" name="discapacidad[3][pies_grado]" id="pg_3" value="2">
                  <input type="hidden" name="discapacidad[3][pies_signo]" id="ps_3" value="Dedos en garfio">
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
                  <input type="hidden" name="discapacidad[3][ojos_grado]" id="og_3" value="2">
                  <input type="hidden" name="discapacidad[3][ojos_signo]" id="os_3" value="Visión borrosa">
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
                <td>
                  <input type="hidden" name="discapacidad[4][termino_tto]" value="Si">
                  <input type="hidden" name="discapacidad[4][numero_control]" value="{{$numero_control}}">
                  2
                </td>
                <td>
                  <input type="hidden" name="discapacidad[4][manos_grado]" id="mg_4" value="2">
                  <input type="hidden" name="discapacidad[4][manos_signo]" id="ms_4" value="Reabsoción leve">
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
                  <input type="hidden" name="discapacidad[4][pies_grado]" id="pg_4" value="2">
                  <input type="hidden" name="discapacidad[4][pies_signo]" id="ps_4" value="Pie caido">
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
                  <input type="hidden" name="discapacidad[4][ojos_grado]" id="og_4" value="2">
                  <input type="hidden" name="discapacidad[4][ojos_signo]" id="os_4" value="Pérdida severa de visión">
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
                <td>
                  <input type="hidden" name="discapacidad[5][termino_tto]" value="Si">
                  <input type="hidden" name="discapacidad[5][numero_control]" value="{{$numero_control}}">
                  2
                </td>
                <td>
                  <input type="hidden" name="discapacidad[5][manos_grado]" id="mg_5" value="2">
                  <input type="hidden" name="discapacidad[5][manos_signo]" id="ms_5" value="Mano caida">
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
                  <input type="hidden" name="discapacidad[5][pies_grado]" id="pg_5" value="2">
                  <input type="hidden" name="discapacidad[5][pies_signo]" id="ps_5" value="Reabsoción leve">
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
                  <input type="hidden" name="discapacidad[5][ojos_grado]" id="og_5" value="2">
                  <input type="hidden" name="discapacidad[5][ojos_signo]" id="os_5" value="Ceguera">
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
                <td>
                  <input type="hidden" name="discapacidad[6][termino_tto]" value="Si">
                  <input type="hidden" name="discapacidad[6][numero_control]" value="{{$numero_control}}">
                  2
                </td>
                <td>
                  <input type="hidden" name="discapacidad[6][manos_grado]" id="mg_6" value="2">
                  <input type="hidden" name="discapacidad[6][manos_signo]" id="ms_6" value="Articulaciones rígidas">
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
                  <input type="hidden" name="discapacidad[6][pies_grado]" id="pg_6" value="2">
                  <input type="hidden" name="discapacidad[6][pies_signo]" id="ps_6" value="Contractura">
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
                <td>
                  <input type="hidden" name="discapacidad[7][termino_tto]" value="Si">
                  <input type="hidden" name="discapacidad[7][numero_control]" value="{{$numero_control}}">
                  2
                </td>
                <td>
                  <input type="hidden" name="discapacidad[7][manos_grado]" id="mg_7" value="2">
                  <input type="hidden" name="discapacidad[7][manos_signo]" id="ms_7" value="Reabsorción grave">
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
                  <input type="hidden" name="discapacidad[7][pies_grado]" id="pg_7" value="2">
                  <input type="hidden" name="discapacidad[7][pies_signo]" id="ps_7" value="Reabsorción grave">
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
              </tr>
      
      
      
            </tbody>
          </table>
          {{$numero_control}}

          <div class="container row">
            <legend>Otras lesiones:</legend>
            <input type="hidden" name="discapacidad[8][termino_tto]" value="Si">
            <input type="hidden" name="discapacidad[8][numero_control]" value="{{$numero_control}}">
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
              <input class="form-control form-control-sm" type="text" name="discapacidad[8][otros]" id="">
            </div>

          </div>

        </fieldset>
      </div>
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-secondary"></button> --}}
      <button type="button" id="btn_save_discap" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
    </div>
  </div>
</div>

<script type="text/javascript">
  // $('.lat').change(function (e) {
  //   e.preventDefault();

  //   var i = event.target.id.toString().split("_");
  //   var signo = $(this).parent().prev('td').text();
  //     if(i[1] >= '2'){
  //       var grado = 2;
  //     } else {
  //       var grado = i[1];
  //     }
  //   $('#'+i[0]+'g_'+i[1]).val(grado);
  //   $('#'+i[0]+'s_'+i[1]).val(signo.trim());

  // });

  $('#discapacidades').bind('hide.bs.modal', function(e){ 
    return validate();
  });  

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
 
                