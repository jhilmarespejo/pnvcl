
@isset($provincias)
    
<select class="form-select" id="provincia{{$position}}" name="">
    <option selected disabled>Seleccione...</option>
    @foreach ($provincias as $provincia)
        <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
    @endforeach
</select>

<script type="text/javaScript">
    $( document ).ready(function() {
        
    $('#provincia0, #provincia1, #provincia2').change(function (params) {
        var params= $(this).val();
        var actual_control = event.target.id.toString();
        var targer_control='';
                $.ajax({
                    data:  {'provincia_id':params, 'q': 'municipios', 'position': actual_control},
                    url:   '/residencia/show',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    type:  'post',
                    beforeSend: function () { 
                        if(actual_control == 'provincia0'){
                            targer_control = "#municipio_anterior0";
                          }
                          if(actual_control == 'provincia1'){
                            targer_control = "#municipio_anterior1";
                          }
                          if(actual_control == 'provincia2'){
                            targer_control = "#municipio_anterior2";
                          }
                    },
                    success:  function (response) {                	
                        //$('#municipio_anterior').remove();
                        $(targer_control).html(response);
                    },
                    error:function(){
                        alert("error")
                    }
                });
        })
    });    
</script>
@endisset

@isset($municipios)
<select class="form-select" id="municipios{{$position}}" name="">
    <option selected disabled>Seleccione...</option>
    @foreach ($municipios as $municipio)
        <option value="{{$municipio->id}}" title="{{$municipio->municipio}}">{{$municipio->municipio}}</option>
    @endforeach
</select>

<script type="text/javaScript">
    $( document ).ready(function() {
        $('#municipios0, #municipios1, #municipios2').change(function (params) {
            var params= $(this).val();
            var actual_control = event.target.id.toString();
            var targer_control='';
            if(actual_control == 'municipios0'){
                targer_control = "#municipio_id0";
            }
            if(actual_control == 'municipios1'){
                targer_control = "#municipio_id1";
            }
            if(actual_control == 'municipios2'){
                targer_control = "#municipio_id2";
            }
            $(targer_control).val( params );
            console.log(params);
            console.log(targer_control);
            

        })
    });
</script>
@endisset


