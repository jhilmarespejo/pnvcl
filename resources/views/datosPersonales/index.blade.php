{{-- SHOW FORM TO CREATE A NEW PATIENT --}}
@extends('layouts.template')
@section('title', 'Registro mensual')

{{-- @php
    print_r($records);
@endphp --}}

@section('content')
<h3 class="text-center">REGISTRO MENSUAL DE CASOS DE LEPRA</h3>
<div class="table-responsive">
    <table class="table table-sm table-bordered table-responsive">
        <thead style="font-size: 13px">
            <tr>
                <th rowspan="3">Apellidos y nombres</th>
                <th rowspan="3" >Edad</th>
                <th rowspan="3" >Sexo</th>
                <th rowspan="3" >Fecha diag.</th>
                <th colspan="2">Procedencia</th>
                <th colspan="2">Laboratorio <br>(BAAR)</th>
                <th colspan="4">Diagnóstico</th>
                <th colspan="2" colspan="2">Esq. de Trat.</th>
                <th rowspan="3">Aciones</th>
            </tr>
            <tr>
                
                
                <th rowspan="2">Localidad</th>
                <th rowspan="2">Municipio</th>
                <th rowspan="2">+</th>
                <th rowspan="2">-</th>
                <th colspan="2">MB</th>
                <th colspan="2">PB</th>
                <th rowspan="2">MB</th>
                <th rowspan="2">PB</th>
            </tr>
            <tr>
                <th>+</th>
                <th>-</th>
                <th>+</th>
                <th>-</th>
                
            </tr>
        </thead>
        <tbody style="font-size: 13px">
            @foreach ($records as $record)
            <tr>
                <td><a href="/paciente/show/{{$record->id}}" class="link-secondary">{{$record->nombres}} {{$record->apellidos}}</a></td>
                <td>{{$record->edad}}</td>
                <td>{{$record->sexo}}</td>
                <td>{{$record->fecha_diagnostico}}</td>
                <td>{{$record->localidad}}</td>
                <td>{{$record->municipio}}</td>
                <td>{{$record->laboratorio_baar}}</td>
                <td>{{$record->laboratorio_baar}}</td>
                <td>{{$record->multibacilar_lepromatosa}}</td>
                <td>{{$record->multibacilar_dimofa}}</td>
                <td>{{$record->paucibacilar_tuberculoide}}</td>
                <td>{{$record->paucibacilar_indeterminada}}</td>
                <td>{{$record->actual_multibacilar}}</td>
                <td>{{$record->actual_paucibacilar}}</td>
                <td><div class="dropdown">
                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Opciones
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="/contactos/edit/{{$record->id}}">Control de contactos</a></li>
                      <li><a class="dropdown-item" href="/seguimiento/create/{{$record->id}}">Seguimiento al tratamiento</a></li>
                      <li><a class="dropdown-item" href="#">Otra opciones</a></li>
                    </ul>
                  </div>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

@endsection
