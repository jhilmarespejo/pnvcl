{{-- 
    THIS VIEW PROCESSES THE INFORMATION SHOW IN: 1. DATOS GENERALES 
--}}

@isset($provincias)
    
    <select class="form-select" id="provincias" name="provincia">
        <option selected disabled>Seleccione...</option>
        @foreach ($provincias as $provincia)
            <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
        @endforeach
    </select>
    <script type="text/javaScript">
        $( document ).ready(function() {
            
        $('#provincias').change(function (params) {
            
            var params= $('#provincias').val();
                    $.ajax({
                        data:  {'provincia_id':params, 'q': 'municipios'},
                        url:   '/servicio/show',
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        type:  'post',
                        beforeSend: function () { },
                        success:  function (response) {                	
                            $('#municipios').remove();
                            $('#servs_salud').remove();
                            $('#redes_salud').remove();
                            $('#datos_personales_servicio_salud_id').val('');	
                            $(".municipios").html(response);
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
    <select class="form-select" id="municipios" name="municipio">
        <option selected disabled>Seleccione...</option>
        @foreach ($municipios as $municipio)
            <option data-toggle="tooltip" data-container="#tooltip_container" value="{{$municipio->id}}" title="{{$municipio->municipio}}">{{$municipio->municipio}}</option>
        @endforeach
    </select>

    <script type="text/javaScript">
        $( document ).ready(function() {
        $('#municipios').change(function (params) {
            var params= $(this).val();
                    $.ajax({
                        data:  {'municipio_id':params, 'q': 'sevicios_salud'},
                        url:   '/servicio/show',
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        type:  'post',
                        beforeSend: function () { },
                        success:  function (response) {                	
                            $('#servs_salud').remove();
                            $('#redes_salud').remove();     
                            $('#datos_personales_servicio_salud_id').val('');
                            $(".serv_salud").html(response);

                        },
                        error:function(){
                            alert("error")
                        }
                    });
            })
        });
    </script>
@endisset





@isset($servicios_salud)
    <select class="form-select" id="servs_salud" name="serv_salud">
        <option selected disabled>Seleccione...</option>
        @foreach ($servicios_salud as $servicio_salud)
            <option value="{{$servicio_salud->id}}" title="{{$servicio_salud->serv_salud}}">{{$servicio_salud->serv_salud}}
            </option>
        @endforeach

    </select>

    <script type="text/javaScript">
        $( document ).ready(function() {
        $('#servs_salud').change(function (params) {
            var params= $(this).val();
                    $.ajax({
                        data:  {'id':params, 'q': 'red_salud'},
                        url:   '/servicio/show',
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        type:  'post',
                        beforeSend: function () { },
                        success:  function (response) {      
                            
                            $('#redes_salud').remove();     
                            $('#datos_personales_servicio_salud_id').val(params);	
                            $(".red_salud").html(response);
                            
                        },
                        error:function(){
                            alert("error")
                        }
                    });
            })
        });
    </script> 
@endisset


@isset($red_salud)
    @foreach ($red_salud as $red) @endforeach
    <input type="text" name="" id="redes_salud" class="form-control" disabled value="{{$red->red_salud}}"> 
@endisset