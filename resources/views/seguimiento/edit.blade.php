@extends('layouts.template')
@section('title', 'Seguimieto')


@section('content')
<div class="position-relative">
    @if(Session::has('success'))
        <div class="col-3 alert alert-success alert-dismissible notification" role="alert">
            <strong>{{Session::get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('warning'))
        <div class="col-3 alert alert-warning alert-dismissible notification" role="alert">
            <strong>{{Session::get('warning') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<h3 class="text-center">FICHA DE SEGUIMIENTO AL TRATAMIENTO</h3>

<div class="container">
	@foreach ($patientRecords as $patientRecord) @endforeach
	<fieldset class="field-border row ">
	<legend>1. Datos del paciente</legend>
		<div class="col-sm">
			<label class="form-label-sm">Nombres y Apellidos</label>
			<input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->nombres.' '.$patientRecord->apellidos }}">
		</div>
		<div class="col-sm">    
			<label data-bs-toggle="tooltip" data-bs-placement="top" class="form-label-sm">Domicilio</label>
			<input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->localidad.', '.$patientRecord->zona.', '.$patientRecord->calle.', Nº. '.$patientRecord->numero }}" >
		</div>
		<div class="col-sm-1">
			<label class="form-label-sm">Edad</label>
			<input readonly type="text" class="form-control form-control-sm" value="{{$patientRecord->edad}}">
		</div>
		<div class="col-sm-1">
			<label class="form-label-sm">Sexo</label>
			<input readonly type="text" class="form-control form-control-sm" value="{{$patientRecord->sexo}}">
		</div>
		<div class="col-sm-2">
			<label class="form-label-sm">Nº Hist. Clínica</label>
			<input readonly type="text" class="form-control form-control-sm" value="{{$patientRecord->historia_clinica}}">
		</div>
	{{-- 	<div class="row"> --}}
		<div class="col-sm">
			<label class="form-label-sm">Serv. de Salud</label>
			<input readonly type="text" class="form-control form-control-sm" value="{{$patientRecord->serv_salud}}">
		</div>
		{{-- </div> --}}
		<div class="row mt-3">
			<div class="col-sm">
				<label class="form-label-sm">Dianóstico</label>
				<input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->diagnostico }}">
			</div>
			<div class="col-sm">
				<label class="form-label-sm">Tratamiento actual</label>
				<input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->esquema_actual }}">
			</div>
			<div class="col-sm">
				<label class="form-label-sm">Fecha dianóstico</label>
				<input readonly type="text" class="form-control form-control-sm" value="{{$patientRecord->fecha_diagnostico}}">
			</div>
			<div class="col-sm">
				<label class="form-label-sm">Nº Ficha</label>
				<input readonly type="text" class="form-control form-control-sm" value="{{$patientRecord->num_ficha}}">
			</div>
			<div class="col-sm">
				<label class="form-label-sm">Fecha inicio TX</label>
				<input readonly type="text" class="form-control form-control-sm" value="{{$patientRecord->actual_fecha_inicio}}">
			</div>
			<div class="col-sm">
				
				<a class="btn btn-primary mt-3 " href="/contactos/edit/{{$patientRecord->id}}">Ver Control de contactos</a>
					{{-- <a class="dropdown-item" href="/seguimiento/edit/{{$patientRecord->id}}">Seguimiento al tratamiento</a> --}}
			</div>
			
		</div>

	</fieldset>
</div>

{{-- {{$discapacidades}} --}}

<div class="mt-3 table-responsive table-responsive-sm  mb-3">
	<table class="table table-sm table table-bordered table-hover mb-2" id="tracing">
		<thead class="bg">
			<tr>
				<th style="width: 1%;" class="align-middle text-center fs-8">1. <br> Control</th>
				<th style="width: 9%;" class="align-middle text-center fs-8">2. <br> Fecha</th>
				<th style="width: 9%;" class="align-middle text-center fs-8">3. Tratamiento multimedi-<br>camentoso<br>(Poli-<br>quimioterapia)</th>
				<th style="width: 10%;" class="align-middle text-center fs-8">4. <br>Estados reaccionales</th>
				<th style="width: 10%;" class="align-middle text-center fs-8">5. Principales hallazgos clínicos</th>
				<th style="width: 13%;" class="align-middle text-center fs-8">6. <br>Tratamiento de <br>estados reaccionales</th>
				<th style="width: 10%;" class="align-middle text-center fs-8">7. <br>Registro de discapacidades al término del tratamiento</th>
				<th style="width: 10%;" class="align-middle text-center fs-8">8. Observaciones</th>
				<th style="width: 10%;" class="align-middle text-center fs-8">9. <br>Condiciones de egreso/alta</th>
				<th style="width: 8%;"></th>
			</tr>		
		</thead>
		<tbody>
			@if ($tracing)
			
				@foreach ($tracing as $trace)
					<tr>
						<td><strong class="align-middle text-center">{{ $trace->numero_control }}</strong></td>
						<td class="fs-8 text-center">{{ $trace->fecha }}</td>
						<td class="fs-8 text-center">{{ $trace->poliquimioterapia }}</td>
						<td>
							<ul class="fs-8 tracing" >
								@php
									echo($trace->er_fecha)? "<li> <strong>$trace->er_fecha</strong></li>" : '';
									echo($trace->er_eritema_nl)? "<li> $trace->er_eritema_nl</li>" : '';
									echo($trace->er_reversion)? "<li> $trace->er_reversion</li>" :'';
									echo($trace->er_fen_luc)? "<li> $trace->er_fen_luc</li>" :'';
									echo($trace->er_otros)? "<li> $trace->er_otros</li>" :'';
								@endphp
							</ul>
						</td>
						<td>
							<ul class="fs-8 tracing ">
								@php
									echo($trace->hc_inicio)? "<li> $trace->hc_inicio</li>" :'';
									echo($trace->hc_durante)? "<li> $trace->hc_durante</li>" :'';
									echo($trace->hc_final)? "<li> $trace->hc_final</li>" :'';
								@endphp
							</ul>
						</td>
						<td>
							<ul class="fs-8 tracing ">
								@php
									echo($trace->talidomida)? "<li>Talidomida: $trace->talidomida</li>" :'';
									echo($trace->clofazimida)? "<li>clofazimida: $trace->clofazimida</li>" :'';
									echo($trace->ibuprofeno)? "<li>ibuprofeno: $trace->ibuprofeno</li>" :'';
									echo($trace->paracetamol)? "<li>paracetamol: $trace->paracetamol</li>" :'';
									echo($trace->ciprofloxacina)? "<li>ciprofloxacina: $trace->ciprofloxacina</li>" :'';
									echo($trace->claritromicina)? "<li>claritromicina: $trace->claritromicina</li>" :'';
									echo($trace->prednisona)? "<li>prednisona: $trace->prednisona</li>" :'';
									echo($trace->otros)? "<li>$trace->otros: $trace->fecha_otros</li>" :'';
								@endphp
							</ul>
						</td>
						<td>
							@if ( isset($trace->culmina_tto) && isset($trace->fecha_fin_tto) &&  isset($trace->notificador_alta) )
									<button type="button" class="col btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#discapacidades_termino" data-bs-whatever="@mdo">Registros de discapacidades al término del tratamiento</button>

								    <div class="modal fade" id="discapacidades_termino" tabindex="-1" aria-labelledby="discapacidadLabel" aria-hidden="true">
								        @include('seguimiento.discapacidades_termino', ['discapacidades' => $discapacidades ]);
								    </div>
							@endif
						</td>
						<td>
							<span class="fs-8">{{ $trace->obs }}</span>
						</td>
						<td>
							<ul class="fs-8 tracing ">
								@php
									echo($trace->culmina_tto)? "<li>$trace->culmina_tto</li>" :'';
									echo($trace->fecha_fin_tto)? "<li>En fecha: $trace->fecha_fin_tto</li>" :'';
									echo($trace->notificador_alta)? "<li> $trace->notificador_alta</li>" :'';
								@endphp
							</ul>
						</td>
						<td>
							@if ( isset($trace->culmina_tto) && isset($trace->fecha_fin_tto) &&  isset($trace->notificador_alta) )
									<button class="btn btn-danger btn-danger" disabled>El paciente finalizó el tratamiento </button>
								@endif
						</td>
					</tr>
				@endforeach

			@endif

			{{-- {{ count($tracing) }} --}}
		{{-- 	{{$errors}} 
			>>{{ $trace->culmina_tto }} --}}

			@php
				if ( !isset($trace) ){
					$trace = (object) array('numero_control' => 0, 'culmina_tto' => '', 'fecha_fin_tto' => '', 'notificador_alta' => '');
				}
			@endphp

				@if ( $trace->culmina_tto == '' && $trace->fecha_fin_tto == '' && $trace->notificador_alta == '' )
					<form method="POST" id="form" action="{{route('seguimiento.store')}}" >
					@csrf
						<tr>
							<td>
								<strong id="txt_num_control">{{ $trace->numero_control + 1 }}</strong>
								<input type="hidden" name="numero_control" value="{{ $trace->numero_control + 1 }}">
							</td>
							<td>
								<input type="hidden" name="datos_personales_id" value="{{ $patientRecord->id }}" >
								<input type="date" value="{{ old('fecha') }}" style="font-size: 0.7rem; padding: 0 0;"  name="fecha" class="form-control form-control-sm switch">
								@error('fecha')
			                       <small class="text-danger fs-8"> * {{$message}}</small>
			                    @enderror	
							</td>	
							<td>
								<input type="date" value="{{ old('poliquimioterapia') }}" style="font-size: 0.7rem; padding: 0 0;"  name="poliquimioterapia" class="form-control form-control-sm switch">
								@error('poliquimioterapia')
			                       <small class="text-danger fs-8"> * {{$message}}</small>
			                    @enderror
							</td>
							<td>
								<input type="date" value="{{ old('er_fecha') }}" style="font-size: 0.7rem; padding: 0 0;"  name="er_fecha" class="form-control form-control-sm">

								@error('er_fecha')
	                               <small class="text-danger fs-8"> * {{$message}}</small>
	                            @enderror 
									<div class="row"></div>
								<input type="hidden" name="er_eritema_nl" value="">
								<input class="form-check-input mt-2" type="checkbox" {{ (old('er_eritema_nl'))? 'checked' : '' }} name="er_eritema_nl" value="Eritema Nodoso Leproso">
								<label class="col-form-label-sm text-wrap">Eritema <br> Nodoso <br>Leproso</label>
								@error('er_eritema_nl')
	                               <small class="text-danger fs-8"> * {{$message}}</small>
	                            @enderror
									<div class="row"></div>

								<input type="hidden" name="er_reversion" value="">
								<input class="form-check-input" type="checkbox" {{ (old('er_reversion'))? 'checked' : '' }} name="er_reversion" value="Reaccion de Reversion">
								<label class="col-form-label-sm" >Reacción <br>de Reversión</label>
								@error('er_reversion')
	                               <small class="text-danger fs-8"> * {{$message}}</small>
	                            @enderror
									<div class="row"></div>

								<input type="hidden" name="er_fen_luc" value="">
								<input class="form-check-input" type="checkbox" {{ (old('er_fen_luc'))? 'checked' : '' }} name="er_fen_luc" value="Fenomeno de Lucio">
								<label class="col-form-label-sm" >Fenomeno <br>de Lucio</label>
								@error('er_fen_luc')
	                               <small class="text-danger fs-8"> * {{$message}}</small>
	                            @enderror

								<input class="form-control form-control-sm" type="text" name="er_otros" class="form-control form-control-sm" placeholder="Otros" data-bs-toggle="tooltip" data-bs-placement="top" title="Otros" value="{{ old('er_otros') }}" >
								@error('er_otros')
	                               <small class="text-danger fs-8"> * {{$message}}</small>
	                            @enderror
							</td>
							<td>
								{{-- <textarea rows=1 class="form-control form-control-sm mb-3" type="text" name="hc_inicio" placeholder="Al inicio del tratamiento" data-bs-toggle="tooltip" data-bs-placement="top" title="Hallazgos clínicos al inicio del tratamiento"></textarea>  --}}
								<textarea rows="14" class="form-control form-control-sm mb-3" type="text" name="hc_durante" placeholder="Hallazgos clínicos durante el tratamiento" data-bs-toggle="tooltip" data-bs-placement="top" title="Hallazgos clínicos durante el tratamiento">{{ old('hc_durante') }}</textarea>

								{{-- <textarea rows="1"  class="form-control form-control-sm mb-3" type="text" name="hc_final" placeholder="Al final del tratamiento" data-bs-toggle="tooltip" data-bs-placement="top" title="Hallazgos clínicos al final del tratamiento"></textarea> --}}
							</td>
							<td>
								<div class="row">
									<div class="col-12 float-label mt-1 mt-1">
										<input type="date" name="talidomida" value="" id="" class="drug form-control form-control-sm" placeholder="" onfocus="(this.type='date')" onblur="(this.type='text')" >
										<label>Talidomida</label>
									</div>
									<div class="col-12 float-label mt-1">
										<input type="date" name="clofazimida" value="" id="" class="drug form-control form-control-sm" placeholder="" >
										<label>Clofazimida</label>
									</div>
									<div class="col-12 float-label mt-1">
										<input type="date" name="ibuprofeno" value="" id="" class="drug form-control form-control-sm" placeholder="" >
										<label>Ibuprofeno</label>
									</div>
									<div class="col-12 float-label mt-1">
										<input type="date" name="paracetamol" value="" id="" class="drug form-control form-control-sm" placeholder="" >
										<label>Paracetamol</label>
									</div>
									<div class="col-12 float-label mt-1">
										<input type="date" name="ciprofloxacina" value="" id="" class="drug form-control form-control-sm" placeholder="" >
										<label>Ciprofloxacina</label>
									</div>
									<div class="col-12 float-label mt-1">
										<input type="date" name="claritromicina" value="" id="" class="drug form-control form-control-sm" placeholder="" >
										<label>Claritromicina</label>
									</div>
									<div class="col-12 float-label mt-1">
										<input type="date" name="prednisona" value="" id="" class="drug form-control form-control-sm" placeholder="" >
										<label>Prednisona</label>
									</div>

									<div class="form-group row mt-3">
										<div class="col-12 float-label mt-1">
											<input type="text" name="otros" value="" id="" class=" form-control form-control-sm" placeholder="">
											<label >Otros</label>
										</div>
										<div class="col-12 float-label mt-1">
											<input type="date" name="fecha_otros" value="" id="" class="drug form-control form-control-sm" placeholder="">
											<label >Fecha</label>
										</div>
									</div>
								</div>
							</td>
							<td>
								@if ( ($trace->numero_control + 1) == '6' || ($trace->numero_control + 1) == '12' || ($trace->numero_control + 1) == '18' || ($trace->numero_control + 1) == '24' || ($trace->numero_control + 1) == '30' || ($trace->numero_control + 1) == '36')
									
									
									<div id="alta_medica_chek_container" class="form-check form-switch ms-2 col">
										<input type="hidden" name="alta_medica[alta_medica_check]">
										<input class="col form-check-input" type="checkbox" id="alta_medica" name="alta_medica[alta_medica_check]" value="alta_medica" {{( old('alta_medica.alta_medica_check') == '')? '' : 'checked' }}>
										<br>
										<label class="row col-form-label-sm text-wrap">¿Alta médica?</label>
									</div>

									
									{{-- <div class=""> </div> --}}
									<fieldset disabled="disabled" id="discapacidades_container" class="invisible mt-3">
										<button type="button" class="col btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#discapacidades" data-bs-whatever="@mdo">Registros de discapacidades</button>

									    <div class="modal fade" id="discapacidades" tabindex="-1" aria-labelledby="discapacidadLabel" aria-hidden="true">
									        @include('seguimiento.discapacidades', ['numero_control' => ($trace->numero_control + 1) ]);
									    </div>
										<small id="" class="fs-8 text-danger msg-discapacidad" style="display:none"> * Datos de discapacidad incompletos</small>
									</fieldset>
								@else
									<input type="hidden" name="alta_medica[alta_medica_check]">
				                @endif
							</td>
							<td>
								<textarea name="obs" class="form-control form-control-sm" placeholder="Observaciones" rows="14" >{{ old('obs') }}</textarea>
							</td>
							<td>
								@if ( ($trace->numero_control + 1) == '6' || ($trace->numero_control + 1) == '12' || ($trace->numero_control + 1) == '18')
									{{-- <div class="alta_medica_container"> </div> --}}
									<fieldset disabled="disabled" id="alta_medica_container" class="invisible">
										<label class="fs-8 "> Condiciones de egreso/alta:</label>
										<select class="form-select form-select-sm mt-3" name="culmina_tto" > 
											<option value="">---</option> 
											<option value="Culminó tratamiento">Culminó tratamiento</option> 
											<option value="Abandono">Abandono</option> 
											<option value="Falleció">Falleció</option>
										</select>
											@error('culmina_tto')
						                       <small class="text-danger fs-8"> * {{$message}}</small>
						                    @enderror


										<div class="col-12 float-label mt-3">
											<input type="date" name="fecha_fin_tto" value="" id="" class="form-control form-control-sm" placeholder="" >
											<label>Fecha</label>
											@error('fecha_fin_tto')
						                       <small class="text-danger fs-8"> * {{$message}}</small>
						                    @enderror

										</div>
										<div class="col-12 float-label mt-3">
											<input type="text" name="notificador_alta" class="col form-control form-control-sm" placeholder="Nombre del personal de salud que notifica" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombre del personal de salud que notifica"  value="{{old('notificacion.notificador')}}">
											@error('notificador_alta')
						                       <small class="text-danger fs-8"> * {{$message}}</small>
						                    @enderror

										</div>
									</fieldset>
								@endif
							</td>
							<td>
								@if(Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Operativo' || Auth::user()->rol == 'Super')
									<button type="submit" class="btn btn-success btn-success">Guardar datos </button>
								@endif
								
							</td>
						</tr>
					</form>
				@endif
		</tbody>
	</table>
	
	
</div>

<script type="text/javascript">
$(document).ready(function(){
	
	$(".alert").fadeOut(9500 );
	
	$('.drug').attr('type', 'text');
	$('.drug').focusin(function() {
        $(this).attr('type', 'date');
    });
    $('.drug').focusout(function() {
        $(this).attr('type', 'text');
    });

    //var nFilas = $("#tracing tr").length;
   // $("#control").val(($("#tracing tr").length) - 1);
    //$("#txt_num_control").text(($("#tracing tr").length) - 1);


	document.getElementById('alta_medica').onload = remember();
	$('#alta_medica').click(function(){
		remember();
	});
	function remember(){
		// $('#alta_medica_chek_container').css({
		// 	'background-color': '#ffe455',
		// });

		$('#alta_medica_chek_container').addClass('alert, alert-danger')
		if($('#alta_medica').is(':checked')) {  
            $('#discapacidades_container').removeClass('invisible');
			$('#alta_medica_container').removeClass('invisible');
			$('#discapacidades_container').prop("disabled", false);
			$('#alta_medica_container').prop("disabled", false);
        } else {  
        	$('#discapacidades_container').addClass('invisible');
        	$('#alta_medica_container').addClass('invisible');
			$('#discapacidades_container').prop("disabled", true);
			$('#alta_medica_container').prop("disabled", true);
        }  
	}
});								
</script>

@endsection