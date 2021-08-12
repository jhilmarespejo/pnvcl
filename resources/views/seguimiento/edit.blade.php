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
		<div class="row">
			<div class="col-sm">
				<label class="form-label-sm">Serv. de Salud</label>
				<input readonly type="text" class="form-control form-control-sm" value="{{$patientRecord->serv_salud}}">
			</div>
		</div>
		<div class="row">
			<div class="col-sm">
				<label class="form-label-sm">Dianóstico</label>
				<input readonly type="text" class="form-control form-control-sm" value="{{ $patientRecord->multibacilar_lepromatosa.', '.$patientRecord->multibacilar_dimofa.', '.$patientRecord->paucibacilar_tuberculoide.', '.$patientRecord->paucibacilar_indeterminada }}">
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
				
				<a class="btn btn-primary mt-3 " href="/contactos/edit/{{$patientRecord->id}}">Control de contactos</a>
{{-- <a class="dropdown-item" href="/seguimiento/edit/{{$patientRecord->id}}">Seguimiento al tratamiento</a> --}}
			</div>
			
		</div>

	</fieldset>
</div>

<div class="container mt-3 table-responsive-sm">
	<table class="table table-sm table table-bordered table-hover" id="tracing">
		<thead class="bg">
			<tr>
				<th class="align-middle text-center">1. Control</th>
				<th class="align-middle text-center">2. Fecha</th>
				<th class="align-middle text-center">3. Poliquimioterapia</th>
				<th class="align-middle text-center">4. <br>Estados reaccionales</th>
				<th class="align-middle text-center">5. Principales hallazgos clínicos</th>
				<th class="align-middle text-center">6. <br>Tratamiento de estados reaccionales</th>
				<th class="align-middle text-center">Observaciones</th>
				<th></th>
			</tr>		
		</thead>
		<tbody>
			@foreach ($tracing as $trace)
				<tr>
					<td><strong class="align-middle text-center">{{ $trace->numero_control }}</strong></td>
					<td class="fs-6 text-center">{{ $trace->fecha }}</td>
					<td class="fs-6 text-center">{{ $trace->poliquimioterapia }}</td>
					<td>
						<ul class="fs-6" >
							@php
								echo($trace->er_eritema_nl)? "<li> $trace->er_eritema_nl</li>" : '';
								echo($trace->er_reversion)? "<li> $trace->er_reversion</li>" :'';
								echo($trace->er_fen_luc)? "<li> $trace->er_fen_luc</li>" :'';
								echo($trace->er_otros)? "<li> $trace->er_otros</li>" :'';
							@endphp
						</ul>
					</td>
					<td>
						<ul class="fs-6 ">
							@php
								echo($trace->hc_inicio)? "<li> $trace->hc_inicio</li>" :'';
								echo($trace->hc_durante)? "<li> $trace->hc_durante</li>" :'';
								echo($trace->hc_final)? "<li> $trace->hc_final</li>" :'';
							@endphp
						</ul>
					</td>
					<td>
						<ul class="fs-6 ">
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
					<td>{{ $trace->obs }}</td>
					<td></td>
				</tr>
			@endforeach

			<form method="post" id="form" action="{{route('seguimiento.store')}}">
				@csrf
			<tr >
				<td><strong id="txt_num_control"></strong><input type="hidden" name="numero_control" id="control"></td>
				<td>
					<input type="hidden" name="datos_personales_id" value="{{ $patientRecord->id }}" >
					<input type="date" name="fecha" class="form-control form-control-sm switch">
					@error('fecha')
                       <small class="text-danger"> * {{$message}}</small>
                    @enderror
						
				</td>	
				<td>
					<input type="date" name="poliquimioterapia" class="form-control form-control-sm switch">
					@error('poliquimioterapia')
                       <small class="text-danger"> * {{$message}}</small>
                    @enderror
				</td>
				
				<td>
					<input type="date" name="er_fecha" class="form-control form-control-sm">
						<div class="row"></div>
					<input type="hidden" name="er_eritema_nl" value="">
					<input class="form-check-input" type="checkbox" name="er_eritema_nl" value="Eritema Nodoso Leproso">
					<label class="col-form-label-sm text-wrap">Eritema <br> Nodoso Leproso</label>
						<div class="row"></div>
					<input type="hidden" name="er_reversion" value="">
					<input class="form-check-input" type="checkbox" name="er_reversion" value="Reaccion de Reversion">
					<label class="col-form-label-sm" >Reacción <br>de Reversión</label>
						<div class="row"></div>
					<input type="hidden" name="er_fen_luc" value="">
					<input class="form-check-input" type="checkbox" name="er_fen_luc" value="Fenomeno de Lucio">
					<label class="col-form-label-sm" >Fenomeno <br>de Lucio</label>

					<input class="form-control form-control-sm" type="text" name="er_otros" class="form-control form-control-sm" placeholder="Otros" data-bs-toggle="tooltip" data-bs-placement="top" title="Otros">
				</td>
				<td>
					<textarea rows=1 class="form-control form-control-sm mb-3" type="text" name="hc_inicio" placeholder="Al inicio del tratamiento" data-bs-toggle="tooltip" data-bs-placement="top" title="Hallazgos clínicos al inicio del tratamiento"></textarea>

					<textarea rows="1" class="form-control form-control-sm mb-3" type="text" name="hc_durante" placeholder="Durante el tratamiento" data-bs-toggle="tooltip" data-bs-placement="top" title="Hallazgos clínicos durante el tratamiento"></textarea>

					<textarea rows="1"  class="form-control form-control-sm mb-3" type="text" name="hc_final" placeholder="Al final del tratamiento" data-bs-toggle="tooltip" data-bs-placement="top" title="Hallazgos clínicos al final del tratamiento"></textarea>
				</td>
				<td>
					<div class="row">
						<div class="col-6 float-label">
							<input type="date" name="talidomida" value="" id="" class="drug form-control form-control-sm" placeholder="" onfocus="(this.type='date')" onblur="(this.type='text')" >
							<label>Talidomida</label>
						</div>
						<div class="col-6 float-label">
							<input type="date" name="clofazimida" value="" id="" class="drug form-control form-control-sm" placeholder="" >
							<label>Clofazimida</label>
						</div>
						<div class="row mt-3"></div>
						<div class="col-6 float-label">
							<input type="date" name="ibuprofeno" value="" id="" class="drug form-control form-control-sm" placeholder="" >
							<label>Ibuprofeno</label>
						</div>
						<div class="col-6 float-label">
							<input type="date" name="paracetamol" value="" id="" class="drug form-control form-control-sm" placeholder="" >
							<label>Paracetamol</label>
						</div>
						<div class="row mt-3"></div>
						<div class="col-6 float-label">
							<input type="date" name="ciprofloxacina" value="" id="" class="drug form-control form-control-sm" placeholder="" >
							<label>Ciprofloxacina</label>
						</div>
						<div class="col-6 float-label">
							<input type="date" name="claritromicina" value="" id="" class="drug form-control form-control-sm" placeholder="" >
							<label>Claritromicina</label>
						</div>
						<div class="row mt-3"></div>
						<div class="col-6 float-label">
							<input type="date" name="prednisona" value="" id="" class="drug form-control form-control-sm" placeholder="" >
							<label>Prednisona</label>
						</div>

						<div class="form-group row mt-3">
							<div class="col-6 float-label">
								<input type="text" name="otros" value="" id="" class=" form-control form-control-sm" placeholder="">
								<label >Otros</label>
							</div>
							<div class="col-6 float-label">
								<input type="date" name="fecha_otros" value="" id="" class="drug form-control form-control-sm" placeholder="">
								<label >Fecha</label>
							</div>
						</div>
					</div>
				</td>
				<td>
					<textarea name="obs" class="form-control"></textarea>
				</td>
				<td>
					<button type="submit" class="btn btn-success btn-success">Guardar datos </button>
				</td>

			</tr>
			</form>
		</tbody>
	</table>
</div>
<style>

</style>
<script type="text/javascript">
$(document).ready(function(){
	
	$(".alert").fadeOut(9500 );
	
	$('.drug, .switch').attr('type', 'text');
	$('.drug, .switch').focusin(function() {
        $(this).attr('type', 'date');
    });
    $('.drug, .switch').focusout(function() {
        $(this).attr('type', 'text');
    });

    //var nFilas = $("#tracing tr").length;
    $("#control").val(($("#tracing tr").length) - 1);
    $("#txt_num_control").text(($("#tracing tr").length) - 1);
});
</script>

@endsection