@extends('layouts.template')
@section('title', 'Registro de usuarios')

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


<h3 class="text-center mb-3">USUARIOS</h3>

<div class="table-responsive">
    <table class="table table-sm table-bordered table-responsive table-hover " id="users">
        <thead style="font-size: 13px">
            <tr class="text-center">
                <th class="text-center col-1">ID</th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">eMAIL</th>
                <th class="text-center">ROL</th>
                <th class="text-center">PASSWORD <br> 
                    @error('user.password')
                        <small class="text-danger fs-8 alert-danger">* {{ $message }} </small>
                    @enderror
                </th>
                <th class="text-center">ACCIONES</th>
            </tr>
        </thead>
        {{-- {{$errors}} --}}
       
            <tbody>
            @foreach ($users as $user)
            <form method="post" action="{{ route('users.update') }}">
                @csrf
                @method('put')
                <tr>
                    <td> 
                        <input class="form-control" type="number" readonly name="id" value="{{ $user->id }}">
                    </td>
                    <td> 
                        {{-- <input class="form-control" type="text" name="name" value="{{ $user->name }}">  --}}
                        {{ $user->name }}
                    </td>
                    <td> <input class="form-control-sm form-control" type="email" name="user[email]" value="{{ $user->email }}"> </td>
                    <td> 
                        <select id="rol" class="form-select form-select-sm @error('rol') is-invalid @enderror" name="user[rol]" >
                            <option value="" disabled {{ ($user->rol == '' )? 'selected' : '' }} >Seleccione</option>
                            <option value="Ejecutivo" {{ ($user->rol == 'Ejecutivo' )? 'selected' : '' }} >Ejecutivo</option>
                            <option value="Administrador" {{ ($user->rol == 'Administrador' )? 'selected' : '' }} >Administrador</option>
                            <option value="Operativo" {{ ($user->rol == 'Operativo' )? 'selected' : '' }} >Operativo</option>
                        </select>
                    </td>
                    <td class="col-3">
                        <div class="row" >
                            <span class="col-4 form-check form-switch ms-3">
                                <input class="form-check-input  change-password" type="checkbox" name="change_password" value="new_password">
                                <label class="fs-8">Cambiar</label>
                            </span>

                            <span class="col">
                                <input id="password" disabled type="password" class="form-control-sm  form-control" name="user[password]" >

                                {{-- @error('password')
                                   <small class="text-danger fs-8"> * {{$message}}</small>
                                @enderror --}}
                            </span>
                        </div>

                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <button class="dropdown-item"  type="submit">Actualizar dato</button>
                                </li>
                                <li>
                                    <span class="dropdown-item btn"> 
                                        <span class="destroy-{{ $user->id }}" id="destroy" >Eliminar</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </form>

            <form action="{{ route('users.destroy') }}" method="post" id="destroy-{{ $user->id }}"
                    onsubmit="return confirm('¿Está seguro de eliminar a éste usuario?')">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{ $user->id  }}">
            </form>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {{-- {{ $users->links() }} --}}
    </div>
    

</div>
    

<script type="text/javascript">
    $(".alert").fadeOut(9500);

 $("span#destroy").on('click', function () {
    var actual_form = $(this).attr('class').toString();
    $('#'+actual_form).submit();
    //console.log('#'+actual_form);
 })
    
$(document).ready(function(){

$('.change-password').click(function(){

    if($(this).is(':checked')) {  
        $(this).parent().siblings().children().prop("disabled", false);
        //$('this').parent().find('input').removeClass('invisible');
        //$('this').prop("disabled", false);
    } else {  
        $(this).parent().siblings().children().prop("disabled", true);
        //$('#this').parent().siblings().children().addClass('invisible');
        //$('#discapacidades_container').prop("disabled", true);
    }

});

    



    $('#usersxx').DataTable({
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
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
            "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
            "infoFiltered": "(Filtrado de _MAX_ total Registros)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin Registros encontrados",
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


