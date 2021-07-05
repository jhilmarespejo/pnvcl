<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="controlContactosLabel">3. Control de contactos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <table class="table table-responsive table-bordered text-center">
              <thead>
                  <tr>
                      <th>Departamento</th>
                      <th>Provincia</th>
                      <th>Municipio</th>
                      <th>Tiempo de residencia</th>
                  </tr>
              </thead>
              <tbody>
                @php for ($i=0; $i <= 2; $i++): @endphp
                <tr>
                    <input type="hidden" name="recidencia_anterior[{{$i}}][municipio_id]" value="">
                    <td><input name="" type="text"></td>
                    <td><input name="" type="text"></td>
                    <td><input name="" type="text"></td>
                    <td>
                        <input name="recidencia_anterior[{{$i}}][tiempo]" type="number" min="0" max="100" class="col-3">
                        <select class="col-4" name="recidencia_anterior[{{$i}}][medida]" >
                            <option selected disabled>Seleccione...</option>
                            <option value="Meses">Meses</option>
                            <option value="Años">Años</option>
                        </select>
                    </td>
                </tr>               
                @php endfor; @endphp
                       
              </tbody>
          </table>
        
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button> --}}
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>

  <script type="text/javaScript">
    $(document).ready(function(){
        
    });
  </script>