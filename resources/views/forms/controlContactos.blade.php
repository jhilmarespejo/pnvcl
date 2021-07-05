<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="controlContactosLabel">3. Control de contactos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <table class="table table-responsive table-bordered ">
              <thead>
                  <tr>
                      <th>Apellidos</th>
                      <th>Nombres</th>
                      <th>Edad</th>
                      <th>Parentesco o Afinidad</th>
                      <th>Antecedente de lepra</th>
                      <th>Fecha</th>
                  </tr>
              </thead>
              <tbody>

                @php for ($i=0; $i <= 2; $i++): @endphp
                  <tr>
                      <td><input name="control_contactos[{{$i}}][apellidos]" type="text"></td>
                      <td><input name="control_contactos[{{$i}}][nombres]" type="text"></td>
                      <td><input name="control_contactos[{{$i}}][edad]" type="number"></td>
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