<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title text-center" id="controlContactosLabel">8. Registro de discapacidades</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="container row mt-3 table-responsive">
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
                <th>D/I</th>
                <th>Signos</th>
                <th>D/I</th>
                <th>Signos</th>
                <th>D/I</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> 0 </td>
                <td>
                  <input type="hidden" name="discapacidad[0][manos_grado]" value="0">
                  <input type="hidden" name="discapacidad[0][manos_signo]" value="sin daños">
                  Sin daños
                </td>
                <td> 
                  <select class="form-select form-select-sm" name="discapacidad[0][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[0][pies_grado]" value="0">
                  <input type="hidden" name="discapacidad[0][pies_signo]" value="sin daños">
                  Sin daños
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[0][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[0][ojos_grado]" value="0">
                  <input type="hidden" name="discapacidad[0][ojos_signo]" value="sin daños">
                  Sin daños
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[0][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
              </tr>
      
              <tr>
                <td>1</td>
                <td>
                  <input type="hidden" name="discapacidad[1][manos_grado]" value="1">
                  <input type="hidden" name="discapacidad[1][manos_signo]" value="Insensibilidad">
                  Insensibilidad
                </td>
                <td> 
                  <select class="form-select form-select-sm" name="discapacidad[1][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[1][pies_grado]" value="1">
                  <input type="hidden" name="discapacidad[1][pies_signo]" value="Insensibilidad">
                  Insensibilidad
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[1][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[1][ojos_grado]" value="1">
                  <input type="hidden" name="discapacidad[1][ojos_signo]" value="Enrojecimiento de la conjuntiva">
                  Enrojecimiento de la conjuntiva
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[1][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
              </tr>
      
              <tr>
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[2][manos_grado]" value="2">
                  <input type="hidden" name="discapacidad[2][manos_signo]" value="Úlcelas y lesiones traumáticas">
                  Úlcelas y lesiones traumáticas
                </td>
                <td> 
                  <select class="form-select form-select-sm" name="discapacidad[2][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[2][pies_grado]" value="2">
                  <input type="hidden" name="discapacidad[2][pies_signo]" value="Mal performante">
                  Mal performante
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[2][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[2][ojos_grado]" value="2">
                  <input type="hidden" name="discapacidad[2][ojos_signo]" value="Iritis o queratitis">
                  Iritis o queratitis
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[2][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
              </tr>
      
              <tr>
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[3][manos_grado]" value="2">
                  <input type="hidden" name="discapacidad[3][manos_signo]" value="Mano en garra movible">
                  Mano en garra movible
                </td>
                <td> 
                  <select class="form-select form-select-sm" name="discapacidad[3][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[3][pies_grado]" value="2">
                  <input type="hidden" name="discapacidad[3][pies_signo]" value="Dedos en garfio">
                  Dedos en garfio
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[3][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[3][ojos_grado]" value="2">
                  <input type="hidden" name="discapacidad[3][ojos_signo]" value="Visión borrosa">
                  Visión borrosa
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[3][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
              </tr>
      
      
              <tr>
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[4][manos_grado]" value="2">
                  <input type="hidden" name="discapacidad[4][manos_signo]" value="Reabsoción leve">
                  Reabsoción leve
                </td>
                <td> 
                  <select class="form-select form-select-sm" name="discapacidad[4][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[4][pies_grado]" value="2">
                  <input type="hidden" name="discapacidad[4][pies_signo]" value="Pie caido">
                  Pie caido
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[4][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[4][ojos_grado]" value="2">
                  <input type="hidden" name="discapacidad[4][ojos_signo]" value="Pérdida severa de visión">
                  Pérdida severa de visión
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[4][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
              </tr>
      
              <tr>
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[5][manos_grado]" value="2">
                  <input type="hidden" name="discapacidad[5][manos_signo]" value="Mano caida">
                  Mano caida
                </td>
                <td> 
                  <select class="form-select form-select-sm" name="discapacidad[5][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[5][pies_grado]" value="2">
                  <input type="hidden" name="discapacidad[5][pies_signo]" value="Reabsoción leve">
                  Reabsoción leve
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[5][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[5][ojos_grado]" value="2">
                  <input type="hidden" name="discapacidad[5][ojos_signo]" value="Ceguera">
                  Ceguera
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[5][ojos_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
              </tr>
      
              <tr>
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[6][manos_grado]" value="2">
                  <input type="hidden" name="discapacidad[6][manos_signo]" value="Articulaciones rígidas">
                  Articulaciones rígidas
                </td>
                <td> 
                  <select class="form-select form-select-sm" name="discapacidad[6][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[6][pies_grado]" value="2">
                  <input type="hidden" name="discapacidad[6][pies_signo]" value="Contractura">
                  Contractura
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[6][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[6][ojos_grado]" value="">
                  <input type="hidden" name="discapacidad[6][ojos_signo]" value="">
                  <input type="hidden" name="discapacidad[6][ojos_lat]]" value="" >
                </td>
                <td>
                  
                </td>
              </tr>
      
              <tr>
                <td>2</td>
                <td>
                  <input type="hidden" name="discapacidad[7][manos_grado]" value="2">
                  <input type="hidden" name="discapacidad[7][manos_signo]" value="Reabsorción grave">
                  Reabsorción grave
                </td>
                <td> 
                  <select class="form-select form-select-sm" name="discapacidad[7][manos_lat]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[7][pies_grado]" value="2">
                  <input type="hidden" name="discapacidad[7][pies_signo]" value="Reabsorción grave">
                  Reabsorción grave
                </td>
                <td>
                  <select class="form-select form-select-sm" name="discapacidad[7][pies_lat]]" > 
                    <option value="" selected>---</option> 
                    <option value="D">Derecha</option> 
                    <option value="I">Izquierda</option> 
                    <option value="D/I">Izquierda y derecha</option>
                  </select>
                </td>
                <td>
                  <input type="hidden" name="discapacidad[7][ojos_grado]" value="">
                  <input type="hidden" name="discapacidad[7][ojos_signo]" value="">
                  <input type="hidden" name="discapacidad[7][ojos_lat]" value="" >
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
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-secondary"></button> --}}
      <button type="button" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
    </div>
  </div>
</div>




