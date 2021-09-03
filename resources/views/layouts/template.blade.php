<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="/bootstrap5/css/bootstrap.css" type="text/css">
    <link rel=StyleSheet href="/bootstrap5/css/custom.css" type="text/css">
    <script src="/bootstrap5/js/jquery.min.js"></script>
    <script src="/bootstrap5/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="/bootstrap5/js/custom.js"></script> --}}
  
    
    <link rel="stylesheet" type="text/css" href="/bootstrap5/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="/bootstrap5/DataTables/datatables.min.js"></script>


    <script type="text/javascript" src="/bootstrap5/DataTables/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/bootstrap5/DataTables/jszip.min.js"></script>
    <script type="text/javascript" src="/bootstrap5/DataTables/buttons.html5.min.js"></script>



   {{--  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/> --}}
{{-- <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script> --}}
    <title>.:@yield('title'):.</title>


</head>
<body>
  <nav class="navbar fixed-top nav-custom-1">
    <img class="img-fluid" src="/images/navbar1.png" alt="...">
      <div class="container-fluid flex-row-reverse fixed-top" style="margin: 2% 0% 0% -4%;">
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            @if ( Auth::check() )
              {{ Auth::user()->name }}
            @else
                Opciones
            @endif
          </a>
          <ul class="dropdown-menu">
              @guest
              @if (Route::has('login'))
                  <li>
                      <a class="dropdown-item" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                      <a class="dropdown-item" href="/reportes/index">Reportes</a>
                  </li>
              @endif
              @else
                  <li>
                    <a class="dropdown-item" href="/paciente/create">Nuevo Paciente</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/paciente/index">Registro de casos</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/reportes/index">Reportes</a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              {{ __('Salir') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf </form>
                  </li>
                  
              @endguest
          </ul>
        </div>
      </div>
  </nav>
 
{{-- GENERAL CONTENT --}}

  <div id="body_container" class="container-fluid container-xxl ">
    {{-- {{ Route::currentRouteName() }} --}}
    
    @if(Route::currentRouteName() == 'login')
      <style type="text/css">
          div#body_container{
          background: url('/images/content.jpg')  #e8e8e8 no-repeat center top !important;
          background-size: 100% !important;
        }
      </style>
    @elseif(Route::currentRouteName() == 'home')
        @if (Auth::user())
          <style type="text/css">
              div#body_container{
                  background: url('/images/home.jpg')  #e8e8e8 no-repeat center top !important;
                  background-size: 100%;
                  height: 55rem;
              }
          </style>
        @else
          <style type="text/css">
              div#body_container{
              background: url('/images/logout.jpg')  #e8e8e8 no-repeat center top !important;
              background-size: 100% !important;
            }
          </style>
        @endif
    @else
      <style type="text/css">
          div#body_container{
          background: url('/images/bg4.jpg')  #e8e8e8 no-repeat center top fixed !important;
          height: auto;
        }
      </style> 
    @endif
    <div class="container-xxl border border-2 rounded img-fluid">
        {{-- <div class=""> --}}
            @yield('content')
        {{-- </div> --}}
    </div>
  </div>
</body>
</html>


<script type="text/javaScript">
  function doAjax( params, beforeCallback, successCallback, errorCallback) {
      $.ajax({
          url : '/servicio/show',
          data : params,
          type : 'POST',
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
          beforeSend: beforeCallback,
          success : successCallback,
          error : errorCallback,
      });
  }
// FUNCTION FOR TOOLTIPS
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });
// FUNCTION FOR VALIDATE FORM CLIENT SIDE
// Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict'
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
$(document).ready(function(){

});
</script>

