{{-- SHOW FORM TO CREATE A NEW PATIENT --}}
@extends('layouts.template')
@section('title', 'Registro mensual')

{{-- @php
    print_r($records);
@endphp --}}

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
<h3 class="text-center">REGISTRO MENSUAL DE CASOS DE LEPRA</h3>
<div class="table-responsive">
    <table class="table table-sm table-bordered table-responsive" id="patients">
        <thead style="font-size: 13px">
            <tr class="text-center">
                <th rowspan="3" class="invisiblex"></th>
                <th class="text-center" rowspan="3">Apellidos y nombres</th>
                <th class="text-center" rowspan="3" >Edad</th>
                <th class="text-center" rowspan="3" >Sexo</th>
                <th class="text-center" rowspan="3" >Fecha diag.</th>
                <th colspan="2">Procedencia</th>
                <th colspan="2">Laboratorio <br>(BAAR)</th>
                <th colspan="4">Diagnóstico</th>
                <th colspan="2" colspan="2">Esq. de Trat.</th>
                <th class="text-center" rowspan="3">Aciones</th>
            </tr>
            <tr>
                
                
                <th class="text-center" rowspan="2">Localidad</th>
                <th class="text-center" rowspan="2">Municipio</th>
                <th class="text-center" rowspan="2">+</th>
                <th class="text-center" rowspan="2">-</th>
                <th colspan="2">MB</th>
                <th colspan="2">PB</th>
                <th class="text-center" rowspan="2">MB</th>
                <th class="text-center" rowspan="2">PB</th>
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
                {{-- <td><a href="/paciente/show/{{$record->id}}" class="link-secondary" style="text-transform:uppercase;">{{$record->nombres}} {{$record->apellidos}}</a></td> --}}
                <td ><span style="font-size:0px">{{$record->id}}</span>
                <td><span style="text-transform:uppercase;">{{$record->nombres}} {{$record->apellidos}}</span></td>
                <td>{{$record->edad}}</td>
                <td>{{$record->sexo}}</td>
                <td>{{$record->fecha_diagnostico}}</td>
                <td>{{$record->localidad}}</td>
                <td>{{$record->municipio}}</td>
                <td>{{-- {{$record->laboratorio_baar}} --}}</td>
                <td>{{-- {{$record->laboratorio_baar}} --}}</td>
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
                      <li><a class="dropdown-item" href="/seguimiento/edit/{{$record->id}}">Seguimiento al tratamiento</a></li>
                    </ul>
                  </div>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(".alert").fadeOut(9500 );
    
$(document).ready( function () {
    
    $('#patients').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "order": [[ 0, 'desc' ]]
    });

} );
</script>
@endsection
