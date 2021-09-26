@extends('layouts.template')
@section('title', 'Registro de usuarios')

@section('content')

<h3 class="text-center mb-3">REGISTRO DE USUARIOS</h3>

<div class="table-responsive">
    <table class="table table-sm table-bordered table-responsive " id="users">
        <thead style="font-size: 13px">
            <tr class="text-center">
                <th class="text-center">ID</th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">eMAIL</th>
                <th class="text-center">ROL</th>
                <th class="text-center">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td> <input class="form-control" type="number" readonly name="id" value="{{ $user->id }}"> </td>
                <td> <input class="form-control" type="text" name="name" value="{{ $user->name }}"> </td>
                <td> <input class="form-control" type="email" name="email" value="{{ $user->email }}"> </td>
                <td> 
                    <select id="rol" class="form-select @error('rol') is-invalid @enderror" name="rol" >
                        <option value="" disabled {{ ($user->rol == '' )? 'selected' : '' }} >Seleccione</option>
                        <option value="Ejecutivo" {{ ($user->rol == 'Ejecutivo' )? 'selected' : '' }} >Ejecutivo</option>
                        <option value="Administrador" {{ ($user->rol == 'Administrador' )? 'selected' : '' }} >Administrador</option>
                        <option value="Operativo" {{ ($user->rol == 'Operativo' )? 'selected' : '' }} >Operativo</option>
                    </select>
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Opciones
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/contactos/edit/{{ $user->id }}">Guardar cambios</a></li>
                            <li><a class="dropdown-item" href="/seguimiento/edit/{{ $user->id }}">Eliminar</a></li>
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


    $('#users').DataTable({
        //"dom": '<"row sticky-top mt-4" <"col" B><"col" l><"col" f>>rt<"row" <"col" i><"col" p>>',
        // buttons: [
        //     {
        //         extend: 'excel',
        //         text: 'Exportar a Excel',
        //         exportOptions: {
        //             columns: [1,2,3,4],
        //             modifier: {
        //             page: 'all'
        //             }
        //         }

        //     }
        // ],
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
        // "columnDefs": [
        //     {
        //         "targets": [0],
        //         "visible": false,
        //         "searchable": false,
        //         'visible': false
        //     }],
        "order": [[ 0, 'desc' ]],

    });

} );
</script>
@endsection


