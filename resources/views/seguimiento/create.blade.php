@extends('layouts.template')
@section('title', 'Seguimieto')



@section('content')

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
			
		</div>

	</fieldset>
</div>

@endsection