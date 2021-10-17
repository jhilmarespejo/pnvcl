@extends('layouts.template')
@section('title', 'Reportes')



@section('content')


<h1>Módulo de Reportes</h1>

<div class="container row">
	{{-- METRIC 1 --}}
	<div class="card border-info col" >
	  <div class="card-header">DETECCION DE CASOS</div>
	  <div class="card-body">
	    <form method="post" id="form_m_1" action="{{route('reportes.show')}}">
	    	<input type="hidden" name="metric" value="m_1">
	    <div class="row">
	    	<label class="row-form-label"><strong>Lugar:</strong></label>
	    	<div class="col">
	    		<select class="row form-select d-inline" id="departamento_m_1" name="departamento_m_1" data-bs-toggle="tooltip2" data-bs-placement="top" title="Departamento">
	                <option selected disabled>Seleccione...</option>
	                <option selected value="" >BOLIVIA</option>
                    <option value="1">Pando</option>
                    <option value="2">Beni</option>
                    <option value="3">Santa Cruz</option>
                    <option value="4">Cochabamba</option>
                    <option value="6">Tarija</option>
                    <option value="5">Chuquisaca</option>
                    <option value="9">La Paz</option>
                    <option value="8">Oruro</option>
                    <option value="7">Potosí</option>
	            </select>
	         </div>
            <div class="col provincia-m-1"></div>
            <div class="col municipio-m-1"></div>
            <div class="col servicio-salud-m-1"></div>
	    </div>
	    
	    <div class="row mt-3"> 
	    	<div class="col">
                <label class="form-label"><strong>Año</strong></label>
                <input class="form-control" type="number" min="2000" max="2050" step="1" value="2021" name="gestion_m_1" />
            </div>
            <div class="col" >
            	<label class="form-label"><strong>Tipo de caso</strong></label>
            	<select class="form-select" name="caso_m_1">
            		<option value="Nuevo" selected>Nuevo</option>
            		<option value="Cronico">Crónico</option>
            		<option value="Recaida">Recaida</option>
            	</select>
            </div>
	    </div>
        </form>
	    <div id="response_m_1"></div>
	    <span id="btn_m_1" class="btn btn-primary  mt-3">Consultar</span>
	  </div>
	</div>

	<div class="col-1"></div>

	{{-- METRIC 2 --}}
	<div class="card border-info col" >
	  <div class="card-header">CASOS EN TRATAMIENTO </div>
	  <div class="card-body">
	    <form method="post" id="form_m_2" action="{{route('reportes.show')}}">
	    	<input type="hidden" name="metric" value="m_2">
	    <div class="row">
	    	<label class="row-form-label"><strong>Lugar:</strong></label>
	    	<div class="col">
	    		<select class="row form-select d-inline" id="departamento_m_2" name="departamento_m_2" data-bs-toggle="tooltip2" data-bs-placement="top" title="Departamento">
	                <option selected disabled>Seleccione...</option>
	                <option selected value="" >BOLIVIA</option>
                    <option value="1">Pando</option>
                    <option value="2">Beni</option>
                    <option value="3">Santa Cruz</option>
                    <option value="4">Cochabamba</option>
                    <option value="6">Tarija</option>
                    <option value="5">Chuquisaca</option>
                    <option value="9">La Paz</option>
                    <option value="8">Oruro</option>
                    <option value="7">Potosí</option>
	            </select>
	         </div>
            <div class="col provincia-m-2"></div>
            <div class="col municipio-m-2"></div>
            <div class="col servicio-salud-m-2"></div>
	    </div>
	    <div class="row mt-3"> 
	    	<div class="col">
                <label class="form-label"><strong>Año</strong></label>
                <input class="form-control" type="number" min="2000" max="2050" step="1" value="2021" name="gestion_m_2" />
            </div>
            <div class="col" >
            	<label class="form-label"><strong>Tipo de caso</strong></label>
            	<select class="form-select" name="caso_m_2">
            		<option value="Nuevo" selected>Nuevo</option>
            		<option value="Cronico">Crónico</option>
            		<option value="Recaida">Recaida</option>
            	</select>
            </div>
	    </div>
        </form>
	    <div id="response_m_2"></div>
	    <span id="btn_m_2" class="btn btn-primary  mt-3">Consultar</span>
	  </div>
	</div>
</div>


<div class="container row mt-5">
	{{-- METRIC 3 --}}
	<div class="card border-info col" >
	  <div class="card-header">PROPORCIÓN DE CASOS CON DG2 ENTRE LOS CASOS NUEVOS DETECTADOS</div>
	  <div class="card-body">
	    <form method="post" id="form_m_3" action="{{route('reportes.show')}}">
	    	<input type="hidden" name="metric" value="m_3">
	    <div class="row">
	    	<label class="row-form-label"><strong>Lugar:</strong></label>
	    	<div class="col">
	    		<select class="row form-select d-inline" id="departamento_m_3" name="departamento_m_3" data-bs-toggle="tooltip2" data-bs-placement="top" title="Departamento">
	                <option selected disabled>Seleccione...</option>
	                <option selected value="" >BOLIVIA</option>
                    <option value="1">Pando</option>
                    <option value="2">Beni</option>
                    <option value="3">Santa Cruz</option>
                    <option value="4">Cochabamba</option>
                    <option value="6">Tarija</option>
                    <option value="5">Chuquisaca</option>
                    <option value="9">La Paz</option>
                    <option value="8">Oruro</option>
                    <option value="7">Potosí</option>
	            </select>
	         </div>
            <div class="col provincia-m-3"></div>
            <div class="col municipio-m-3"></div>
            {{-- <div class="col servicio-salud-m-3"></div> --}}
	    </div>
	    
	    <div class="row mt-3"> 
	    	<div class="col">
                <label class="form-label"><strong>Año</strong></label>
                <input class="form-control" type="number" min="2000" max="2050" step="1" value="2021" name="gestion_m_3" />
            </div>
            <div class="col" >
            	<label class="form-label"><strong>Tipo de caso</strong></label>
            	<select class="form-select" name="caso_m_3">
            		<option value="Nuevo" selected>Nuevo</option>
            		<option value="Cronico">Crónico</option>
            		<option value="Recaida">Recaida</option>
            	</select>
            </div>
	    </div>
        </form>
	    <div id="response_m_3"></div>
	    <span id="btn_m_3" class="btn btn-primary  mt-3">Consultar</span>
	  </div>
	</div>

	<div class="col-1"></div>
	
	{{-- METRIC 4 --}}
	<div class="card border-info col" >
	  <div class="card-header">PROPORCIÓN DE CASOS POR SEXO Y EDAD </div>
	  <div class="card-body">
	    <form method="post" id="form_m_4" action="{{route('reportes.show')}}">
	    	<input type="hidden" name="metric" value="m_4">
	    <div class="row">
	    	<label class="row-form-label"><strong>Lugar:</strong></label>
	    	<div class="col">
	    		<select class="row form-select d-inline" id="departamento_m_4" name="departamento_m_4" data-bs-toggle="tooltip2" data-bs-placement="top" title="Departamento">
	                <option selected disabled>Seleccione...</option>
	                <option selected value="" >BOLIVIA</option>
                    <option value="1">Pando</option>
                    <option value="2">Beni</option>
                    <option value="3">Santa Cruz</option>
                    <option value="4">Cochabamba</option>
                    <option value="6">Tarija</option>
                    <option value="5">Chuquisaca</option>
                    <option value="9">La Paz</option>
                    <option value="8">Oruro</option>
                    <option value="7">Potosí</option>
	            </select>
	         </div>
            <div class="col provincia-m-4"></div>
            <div class="col municipio-m-4"></div>
	    </div>
	    <div class="row mt-3"> 
	    	<div class="col">
            <label class="form-label"><strong>Año</strong></label>
            <input class="form-control" type="number" min="2000" max="2050" step="1" value="2021" name="gestion_m_4" />
        </div>
        <div class="col" >
        	<label class="form-label"><strong>Tipo de caso</strong></label>
        	<select class="form-select" name="caso_m_4">
        		<option value="Nuevo" selected>Nuevo</option>
        		<option value="Cronico">Crónico</option>
        		<option value="Recaida">Recaida</option>
        	</select>
        </div>
	    	<div class="col" >
        	<label class="form-label"><strong>Sexo</strong></label>
        	<select class="form-select" name="sexo_m_4">
        		<option value="Fem" selected>Femenino</option>
        		<option value="Masc">Masculino</option>
        	</select>
        </div>
        <div class="col" >
        	<label class="form-label"><strong>Edad</strong></label>
        	<select class="form-select" name="rango_m_4">
        		<option value="<" selected>Menores de 15 años</option>
        		<option value=">=" >Mayores de 15 años</option>
        	</select>
        </div>
	    	
	    </div>
        </form>
	    <div id="response_m_4"></div>
	    <span id="btn_m_4" class="btn btn-primary  mt-3">Consultar</span>
	  </div>
	</div>
</div>

<div class="container row mt-5">
	{{-- METRIC 5 --}}
	<div class="card border-info col animate fadeInUp" >
	  <div class="card-header">PROPORCIÓN DE CASOS MB ENTRE LOS CASOS NUEVOS DETECTADOS</div>
	  <div class="card-body">
	    <form method="post" id="form_m_5" action="{{route('reportes.show')}}">
	    	<input type="hidden" name="metric" value="m_5">
	    <div class="row">
	    	<label class="row-form-label"><strong>Lugar:</strong></label>
	    	<div class="col">
	    		<select class="row form-select d-inline" id="departamento_m_5" name="departamento_m_5" data-bs-toggle="tooltip2" data-bs-placement="top" title="Departamento">
	                <option selected disabled>Seleccione...</option>
	                <option selected value="" >BOLIVIA</option>
                    <option value="1">Pando</option>
                    <option value="2">Beni</option>
                    <option value="3">Santa Cruz</option>
                    <option value="4">Cochabamba</option>
                    <option value="6">Tarija</option>
                    <option value="5">Chuquisaca</option>
                    <option value="9">La Paz</option>
                    <option value="8">Oruro</option>
                    <option value="7">Potosí</option>
	            </select>
	         </div>
            <div class="col provincia-m-5"></div>
            <div class="col municipio-m-5"></div>
	    </div>
	    
	    <div class="row mt-3"> 
	    	<div class="col">
                <label class="form-label"><strong>Año</strong></label>
                <input class="form-control" type="number" min="2000" max="2050" step="1" value="2021" name="gestion_m_5" />
            </div>
            <div class="col" >
            	<label class="form-label"><strong>Tipo de caso</strong></label>
            	<select class="form-select" name="caso_m_5">
            		<option value="Nuevo" selected>Nuevo</option>
            		<option value="Cronico">Crónico</option>
            		<option value="Recaida">Recaida</option>
            	</select>
            </div>
            <div class="col" >
            	<label class="form-label"><strong>Esquema actual</strong></label>
            	<select class="form-select" name="esquema_m_5">
            		<option value="Multibacilar" selected>Multibacilar</option>
            		<option value="Paucibacilar">Paucibacilar</option>
            	</select>
            </div>
	    </div>
        </form>
	    <div id="response_m_5"></div>
	    <span id="btn_m_5" class="btn btn-primary  mt-3">Consultar</span>
	  </div>
	</div>
	{{-- METRIC 6 --}}
	<div class="col-1"></div>
	<div class="card border-info col" >
	</div>


</div>




    <div class=" animate fadeInUp">
    Going up 
    </div>

    <div class=" animate fadeInDown ">
    Going down
    </div>

    <div class=" animate fadeInLeft ">
    Coming from left
    </div>
  
    <div class=" animate fadeInRight ">
    Coming from right
    </div>


<script type="text/javascript">
	$( document ).ready(function() {
		/* AJAX PROCESS FOR METRIC 1 */
		$('#btn_m_1').click(function (params) {
			$('#response_m_1').fadeOut('fast', function(){
				$('#response_m_1').fadeIn('fast');
			});
			$.ajax({
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
				url: $('#form_m_1').attr("action"),
				type: "POST",
				data: $('#form_m_1').serialize(),
				beforeSend: function () {},
				success:  function (response) {   
					$('#response_m_1').html(response);
				},
				error:function(){
					alert("Error")
				}
			});
		})
		$('#departamento_m_1').change(function (params) {
			doAjax(
				{'sedes_id':$(this).val(), 'q':'provincias', 'new_tag':'provincia_m_1'},
				function() { },
				function (response) { 
					$("#municipio_m_1, #serv_salud_m_1").remove(); 
					$('.provincia-m-1').html(response);
				}, 
				function(){alert("error")}
				);
		});
		/* AJAX PROCESS FOR METRIC 2 */
		$('#btn_m_2').click(function () {
			$('#response_m_2').fadeOut('fast', function(){
				$('#response_m_2').fadeIn('fast');
			});
			$.ajax({
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
				url: $('#form_m_2').attr("action"),
				type: "POST",
				data: $('#form_m_2').serialize(),
				beforeSend: function () {},
				success:  function (response) {   
					$('#response_m_2').html(response);
				},
				error:function(){
					alert("Error")
				}
			});
		})
		$('#departamento_m_2').change(function () {
			doAjax(
				{'sedes_id':$(this).val(), 'q':'provincias', 'new_tag':'provincia_m_2'},
				function() { },
				function (response) { 
					$("#municipio_m_2, #serv_salud_m_2").remove(); 
					$('.provincia-m-2').html(response);
				}, 
				function(){alert("error")}
				);
		});

		/* AJAX PROCESS FOR METRIC 3 */
		$('#btn_m_3').click(function () {
			$('#response_m_3').fadeOut('fast', function(){
				$('#response_m_3').fadeIn('fast');
			});
			$.ajax({
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
				url: $('#form_m_3').attr("action"),
				type: "POST",
				data: $('#form_m_3').serialize(),
				beforeSend: function () {},
				success:  function (response) {   
					$('#response_m_3').html(response);
				},
				error:function(){ alert("Error") }
			});
		})
		$('#departamento_m_3').change(function () {
			doAjax(
				{'sedes_id':$(this).val(), 'q':'provincias', 'new_tag':'provincia_m_3'},
				function() { },
				function (response) { 
					$("#municipio_m_3, #serv_salud_m_3").remove(); 
					$('.provincia-m-3').html(response);
				}, 
				function(){alert("error")}
				);
		});

		/* AJAX PROCESS FOR METRIC 4 */
		$('#btn_m_4').click(function () {
			$('#response_m_4').fadeOut('fast', function(){
				$('#response_m_4').fadeIn('fast');
			});
			$.ajax({
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
				url: $('#form_m_4').attr("action"),
				type: "POST",
				data: $('#form_m_4').serialize(),
				beforeSend: function () {},
				success:  function (response) {   
					$('#response_m_4').html(response);
				},
				error:function(){ alert("Error") }
			});
		})
		$('#departamento_m_4').change(function () {
			doAjax(
				{'sedes_id':$(this).val(), 'q':'provincias', 'new_tag':'provincia_m_4'},
				function() { },
				function (response) { 
					$("#municipio_m_4, #serv_salud_m_4").remove(); 
					$('.provincia-m-4').html(response);
				}, 
				function(){alert("error")}
				);
		});

		/* AJAX PROCESS FOR METRIC 5 */
		$('#btn_m_5').click(function () {
			$('#response_m_5').fadeOut('fast', function(){
				$('#response_m_5').fadeIn('fast');
			});
			$.ajax({
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
				url: $('#form_m_5').attr("action"),
				type: "POST",
				data: $('#form_m_5').serialize(),
				beforeSend: function () {},
				success:  function (response) {   
					$('#response_m_5').html(response);
				},
				error:function(){ alert("Error") }
			});
		})
		$('#departamento_m_5').change(function () {
			doAjax(
				{'sedes_id':$(this).val(), 'q':'provincias', 'new_tag':'provincia_m_5'},
				function() { },
				function (response) { 
					$("#municipio_m_5, #serv_salud_m_5").remove(); 
					$('.provincia-m-5').html(response);
				}, 
				function(){alert("error")}
				);
		});








	});


</script>
@endsection
