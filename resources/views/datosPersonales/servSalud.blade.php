{{-- 
    THIS VIEW PROCESSES THE INFORMATION SHOW IN: 1. DATOS GENERALes
    This file processes the dynamic and dependent views of the select:
    departmento, provincias, municipios, servcio de salud y red de salud 
--}}

@isset($provincias)
   
    <select class="form-select" id="{{ $new_tag }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Provincias" data-bs-toggle="tooltip" data-bs-placement="top" name="{{ $new_tag }}">

        <option selected value="">...</option>
        @foreach ($provincias as $provincia)
            <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
        @endforeach
    </select>
<script type="text/javaScript">
$( document ).ready(function() {
    $('#provincias').change(function (params) {
        doAjax(
          {'provincia_id':$(this).val(), 'q': 'municipios', 'new_tag':'municipios'},
          function() { },
          function (response) { 
            $("#municipios, #servs_salud, #redes_salud").remove(); 
            $('#datos_personales_servicio_salud_id').val('');
            $('.municipios').html(response);}, 
          function(){alert("error")}
        );
    });

    $('#dp_provincias').change(function (params) {
        doAjax(
          {'provincia_id':$(this).val(), 'q':'municipios', 'new_tag':'datos_peersonales[municipio_id]'},
          function() { },
          function (response) { 
            $("#dp_municipio").remove(); 
            $('.dp-municipios').html(response);}, 
          function(){alert("error")}
        );
    });

/*TO PROCESS THE FORM OF METRIC 1*/
    $('#provincia_m_1').change(function (params) {
        doAjax(
          {'provincia_id':$(this).val(), 'q': 'municipios', 'new_tag':'municipio_m_1'},
          function() { },
          function (response) { 
            $("#serv_salud_m_1").remove(); 
            $('.municipio-m-1').html(response); }, 
          function(){alert("error")}
        );
    });
/*TO PROCESS THE FORM OF METRIC 2*/
    $('#provincia_m_2').change(function (params) {
        doAjax(
          {'provincia_id':$(this).val(), 'q': 'municipios', 'new_tag':'municipio_m_2'},
          function() { },
          function (response) { 
            $("#serv_salud_m_2").remove(); 
            $('.municipio-m-2').html(response); }, 
          function(){alert("error")}
        );
    });
/*TO PROCESS THE FORM OF METRIC 3*/
    $('#provincia_m_3').change(function (params) {
        doAjax(
          {'provincia_id':$(this).val(), 'q': 'municipios', 'new_tag':'municipio_m_3'},
          function() { },
          function (response) { 
            $("#serv_salud_m_3").remove(); 
            $('.municipio-m-3').html(response); }, 
          function(){alert("error")}
        );
    });
/*TO PROCESS THE FORM OF METRIC 4*/
    $('#provincia_m_4').change(function (params) {
        doAjax(
          {'provincia_id':$(this).val(), 'q': 'municipios', 'new_tag':'municipio_m_4'},
          function() { },
          function (response) { 
            $("#serv_salud_m_4").remove(); 
            $('.municipio-m-4').html(response); }, 
          function(){alert("error")}
        );
    });
/*TO PROCESS THE FORM OF METRIC 5*/
    $('#provincia_m_5').change(function (params) {
        doAjax(
          {'provincia_id':$(this).val(), 'q': 'municipios', 'new_tag':'municipio_m_5'},
          function() { },
          function (response) { 
            $("#serv_salud_m_5").remove(); 
            $('.municipio-m-5').html(response); }, 
          function(){alert("error")}
        );
    });

});    

</script>
@endisset

@isset($municipios)
    <select class="form-select" id="{{ $new_tag }}" name="{{ $new_tag }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Municipio">
        <option selected value="">...</option>
        @foreach ($municipios as $municipio)
            <option value="{{$municipio->id}}" >{{$municipio->municipio}}</option>
        @endforeach
    </select>

    <script type="text/javaScript">
        $( document ).ready(function() {
            $('#municipios').change(function (params) {
                doAjax(
                  {'municipio_id':$(this).val(), 'q':'sevicios_salud', 'new_tag':'servs_salud'},
                  function() { },
                  function (response) { 
                    $('#redes_salud').remove();
                    $('#datos_personales_servicio_salud_id').val('');
                    $('.serv_salud').html(response);}, 
                  function(){alert("error")}
                );municipios
            });
        /*TO PROCESS THE FORM OF METRIC 1*/
            $('#municipio_m_1').change(function (params) {
                doAjax(
                  {'municipio_id':$(this).val(), 'q':'sevicios_salud', 'new_tag':'serv_salud_m_1'},
                  function() { },
                  function (response) { 
                    $('.servicio-salud-m-1').html(response);}, 
                  function(){alert("error")}
                );
            });
        /*TO PROCESS THE FORM OF METRIC 2*/
            $('#municipio_m_2').change(function (params) {
                doAjax(
                  {'municipio_id':$(this).val(), 'q':'sevicios_salud', 'new_tag':'serv_salud_m_2'},
                  function() { },
                  function (response) { 
                    $('.servicio-salud-m-2').html(response);}, 
                  function(){alert("error")}
                );
            });
        /*TO PROCESS THE FORM OF METRIC 5*/
        $('#municipio_m_5').change(function (params) {
            doAjax(
              {'municipio_id':$(this).val(), 'q':'sevicios_salud', 'new_tag':'serv_salud_m_5'},
              function() { },
              function (response) { 
                $('.servicio-salud-m-5').html(response);}, 
              function(){alert("error")}
            );
        });
            




         });
    </script>
@endisset





@isset($servicios_salud)
    <select class="form-select" id="{{ $new_tag }}" name="{{ $new_tag }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Servicios de salud" >
        <option selected value="">...</option>
        @foreach ($servicios_salud as $servicio_salud)
            <option value="{{$servicio_salud->id}}" >{{$servicio_salud->serv_salud}}
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
                        $('#servicio_salud_notifica').val($("#servs_salud option:selected" ).text());
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

<script type="text/javascript">
    // // FUNCTION FOR TOOLTIPS
    // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    // var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    //   return new bootstrap.Tooltip(tooltipTriggerEl)
    // });
</script>