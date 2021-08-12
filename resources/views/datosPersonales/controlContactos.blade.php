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
                      <th>Fecha</th>
                  </tr>
              </thead>
              <tbody>

                @php for ($i=0; $i <= 2; $i++): @endphp
                  <tr>
                      <td><input name="control_contactos[{{$i}}][contacto_nombres]" type="text"></td>
                      <td><input name="control_contactos[{{$i}}][contacto_apellidos]" type="text"></td>
                      <td><input name="control_contactos[{{$i}}][contacto_edad]" type="number" min="0" ></td>
                      <td>
                          <select class="form-select" name="control_contactos[{{$i}}][parentesco]">
                          <option selected disabled>Seleccione...</option>
                          <option value="Pariente">Pariente</option>
                          <option value="Vecino">Vecino</option>
                          <option value="Otro">Otro</option>
                      </select>
                      </td>
                      <td>
                          <select class="form-select" name="control_contactos[{{$i}}][antecedente_lepra]">
                              <option selected disabled>Seleccione...</option>
                              <option value="Si">Si</option>
                              <option value="No">No</option>
                          </select>
                      </td>
                      <td><input name="control_contactos[{{$i}}][fecha_contacto]" type="date"></td>
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