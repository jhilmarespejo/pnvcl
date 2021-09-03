<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="controlContactosLabel">3. Residencia Anterior</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body table-responsive">
          <table class="table table-sm table-bordered text-center">
              <thead>
                  <tr>
                      <th>Departamento</th>
                      <th>Provincia</th>
                      <th>Municipio</th>
                      <th>Localidad</th>
                      <th>Tiempo de residencia</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                    <td>
                        <select class="form-select" id="dpto0" name="">
                          <option selected disabled>Seleccione...</option>
                          <option value="1">Pando</option>
                          <option value="2">Beni</option>
                          <option value="3">Santa Cruz</option>
                          <option value="4">Cochabamba</option>
                          <option value="6">Tarija</option>
                          <option value="5">Chuquisaca</option>
                          <option value="9">La Paz</option>
                          <option value="8">Oruro</option>
                          <option value="7">Potosi</option>
                      </select>
                    </td>
                    <td><div id="provincia_anterior0"></div></td>
                    <td><div id="municipio_anterior0"></div></td>
                    <td>
                      <input type="text" name="residencia_anterior[0][localidad]" id="">
                    </td>
                    <td>
                        <input type="hidden" id="municipio_id0" name="residencia_anterior[0][municipio_id]" value="">
                        <input name="residencia_anterior[0][tiempo_res_ant_cantidad]" type="number" min="0" max="100" class="col-3">
                        <select class="col-4" name="residencia_anterior[0][tiempo_res_ant_unidad]" >
                            <option selected disabled>Seleccione...</option>
                            <option value="Meses">Meses</option>
                            <option value="Años">Años</option>
                        </select>
                    </td>
                </tr>  

                <tr>
                  <td>
                      <select class="form-select " id="dpto1" name="">
                        <option selected disabled>Seleccione...</option>
                        <option value="1">Pando</option>
                        <option value="2">Beni</option>
                        <option value="3">Santa Cruz</option>
                        <option value="4">Cochabamba</option>
                        <option value="6">Tarija</option>
                        <option value="5">Chuquisaca</option>
                        <option value="9">La Paz</option>
                        <option value="8">Oruro</option>
                        <option value="7">Potosi</option>
                    </select>
                  </td>
                  <td><div id="provincia_anterior1"></div></td>
                  <td><div id="municipio_anterior1"></div></td>
                  <td>
                    <input type="text" name="residencia_anterior[1][localidad]" id="">
                  </td>
                  <td>
                      <input type="hidden" id="municipio_id1" name="residencia_anterior[1][municipio_id]" value="">
                      <input name="residencia_anterior[1][tiempo_res_ant_cantidad]" type="number" min="0" max="100" class="col-3">
                      <select class="col-4" name="residencia_anterior[1][tiempo_res_ant_unidad]" >
                          <option selected disabled>Seleccione...</option>
                          <option value="Meses">Meses</option>
                          <option value="Años">Años</option>
                      </select>
                  </td>
                </tr>               

                <tr>
                  
                  <td>
                      <select class="form-select" id="dpto2" name="">
                        <option selected disabled>Seleccione...</option>
                        <option value="1">Pando</option>
                        <option value="2">Beni</option>
                        <option value="3">Santa Cruz</option>
                        <option value="4">Cochabamba</option>
                        <option value="6">Tarija</option>
                        <option value="5">Chuquisaca</option>
                        <option value="9">La Paz</option>
                        <option value="8">Oruro</option>
                        <option value="7">Potosi</option>
                    </select>
                  </td>
                  <td><div id="provincia_anterior2"></div></td>
                  <td><div id="municipio_anterior2"></div></td>
                  <td>
                    <input type="text" name="residencia_anterior[2][localidad]" id="">
                  </td>
                  <td>
                    <input type="hidden" id="municipio_id2" name="residencia_anterior[2][municipio_id]" value="">
                      <input name="residencia_anterior[2][tiempo_res_ant_cantidad]" type="number" min="0" max="100" class="col-3">
                      <select class="col-4" name="residencia_anterior[2][tiempo_res_ant_unidad]" >
                          <option selected disabled>Seleccione...</option>
                          <option value="Meses">Meses</option>
                          <option value="Años">Años</option>
                      </select>
                  </td>
                </tr>  
                       
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>

  <script type="text/javaScript">
    $(document).ready(function(){
      $('#dpto0, #dpto1, #dpto2').change(function (params) {
           var params= $(this).val();
           var actual_control = event.target.id.toString();
                   $.ajax({
                       data:  {'sedes_id':params, 'q':'provincias', 'position': actual_control},
                       url:   '/residencia/show',
                       headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                       type:  'post',
                       beforeSend: function () { 
                          if(actual_control == 'dpto0'){
                            targer_control = "#provincia_anterior0";
                          }
                          if(actual_control == 'dpto1'){
                            targer_control = "#provincia_anterior1";
                          }
                          if(actual_control == 'dpto2'){
                            targer_control = "#provincia_anterior2";
                          }
                          //$(targer_control).remove();
                       },
                       success:  function (response) {   
                          $(targer_control).html(response);
                       },
                       error:function(){
                           alert("error")
                       }
                   });
           });

      
    });
  </script>