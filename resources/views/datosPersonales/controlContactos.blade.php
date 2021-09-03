<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="controlContactosLabel">3. Control de contactos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body table-responsive">
          <table class="table table-sm table-bordered table-responsive">
              <thead>
                  <tr>
                      
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Edad</th>
                      <th>Parentesco o Afinidad</th>
                      <th>Antecedente de lepra</th>
                      <th>Fecha de contacto</th>
                  </tr>
              </thead>
              <tbody>

                @php for ($i=0; $i <= 2; $i++): @endphp
                  <tr>
                      <td><input id="contacto-nombres-{{$i}}" name="control_contactos[{{$i}}][contacto_nombres]" type="text"></td>
                      <td><input id="contacto-apellidos-{{$i}}" name="control_contactos[{{$i}}][contacto_apellidos]" type="text"></td>
                      <td><input name="control_contactos[{{$i}}][contacto_edad]" type="number" min="0" ></td>
                      <td>
                          <select class="form-select" id="contacto-parentesco-{{$i}}" name="control_contactos[{{$i}}][contacto_parentesco]">
                              <option selected disabled>Seleccione...</option>
                              <option value="Esposa(o)">Esposa(o)</option>
                              <option value="Hija(o)">Hija(o)</option>
                              <option value="Madre">Madre</option>
                              <option value="Padre">Padre</option>
                              <option value="Hermana(o)">Hermana(o)</option>
                              <option value="Tia(o)">Tia(o)</option>
                              <option value="Sobrina(o)">Sobrina(o)</option>
                              <option value="Abuela(o)">Abuela(o)</option>
                              <option value="Vecino">Vecino</option>
                              <option value="Otro">Otro</option>
                          </select>
                      </td>
                      <td>
                          <select class="form-select antecedente" name="control_contactos[{{$i}}][antecedente_lepra]" id="contacto_antecendente_{{$i}}">
                              <option value="" selected>Seleccione</option>
                              <option value="No">No</option>
                              <option value="Si">Si</option>
                          </select>
                      </td>
                      <td><input class="form-control fecha" readonly name="control_contactos[{{$i}}][fecha_contacto]" type="date" id="contacto_fecha_{{$i}}"></td>
                  </tr>
                @php endfor; @endphp
                  
               
                </tbody>
          </table>
        
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button> --}}
        <button type="button" class="btn btn-success disabled" id="btn_save" data-bs-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
  <script type="text/javascript">

    $(document).ready(function(){

      $('.modal-dialog').mousemove (function(event){
        if( ($('#contacto-nombres-0').val()!='' || $('#contacto-apellidos-0').val()!='') && $('#contacto-parentesco-0').val()!=''){
            $('#btn_save').removeClass("disabled");
            $('#msg_contactos').addClass("invisible");
        //console.log('sss');
        } else{
          $('#btn_save').addClass("disabled");
          $('#msg_contactos').removeClass("invisible");
        }
      });

      $('.antecedente').change(function(){
        var i = event.target.id.toString().split("_");
        if($(this).val() == 'Si'){
          $('#contacto_fecha_'+i[2]).removeAttr('readonly');
        } else{
          $('#contacto_fecha_'+i[2]).prop("readonly", true);
        }
      });

    })
  </script>