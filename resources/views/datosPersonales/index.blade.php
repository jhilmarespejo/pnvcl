{{-- SHOW  TABLE ON ALL RECORS OF PATIENTS --}}
@extends('layouts.template')
@section('title', 'Registro de Casos')

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
    <table class="table table-sm table-bordered table-responsive " id="patients">
        <thead style="font-size: 13px">
            <tr class="text-center">
                <th><span style="font-size:10px">COD</span></th>
                <th class="text-center">Apellidos y nombres</th>
                <th class="text-center">Edad</th>
                <th class="text-center">Sexo</th>
                <th class="text-center">Fecha diag.</th>
                <th class="text-center">Localidad</th>
                <th class="text-center">Municipio</th>
                <th>(BAAR)</th>
                <th class="text-center">Diagnóstico</th>
                <th class="text-center">Esquema de Tratamiento</th>
                <th class="text-center">Aciones</th>
            </tr>
            
        </thead>
        <tbody style="font-size: 13px">
            @foreach ($records as $record)
            <tr>
                <td ><span style="font-size:10px">{{$record->id}}</span>
                <td>
                    <a href="/paciente/edit/{{$record->id}}" class="link-secondary" style="text-transform:uppercase;">{{$record->nombres}} {{$record->apellidos}}</a>
                    {{-- <a href="#" class="link-secondary" style="text-transform:uppercase;">{{$record->nombres}} {{$record->apellidos}}</a>--}}
                </td>
                <td>{{$record->edad}}</td>
                <td>{{$record->sexo}}</td>
                <td>{{$record->fecha_diagnostico}}</td>
                <td>{{$record->localidad}}</td>
                <td>{{$record->municipio}}</td>
                <td>{{$record->baar}}</td>
                <td>{{$record->diagnostico}}</td>
                
                <td>{{$record->esquema_actual}}</td>
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
    $(".alert").fadeOut(9500);
    
$(document).ready( function () {


    $('#patients').DataTable({
         "dom": '<"row sticky-top mt-4" <"col" B><"col" l><"col" f>>rt<"row" <"col" i><"col" p>>',
        buttons: [
            {
                extend: 'excel',
                text: 'Exportar a Excel',
                exportOptions: {
                    columns: [1,2,3,4,5,6,7,8,9],
                    modifier: {
                    page: 'all'
                    }
                }

            }
        ],
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
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false,
                'visible': false
            }],
        "order": [[ 0, 'desc' ]],

    });

} );
</script>
@endsection
