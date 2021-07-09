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
  
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

    <script src="/maps/index.js"></script>

    {{-- <script src="/bootstrap5/js/bootstrap.min.js"></script> --}}

    <title>.:@yield('title'):.</title>

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid ">
        <a class="navbar-brand" href="#">Menú: </a>
        
        @if (Auth::check())
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <h4><a class="nav-link" aria-current="page" href="/paciente/create">Nuevo Paciente</a><h3>
              </li>
              <li class="nav-item">
                <h4><a class="nav-link" href="#">Control de Contactos</a></h4>
              </li>
            </ul>
            {{-- <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="nombre y/o apellido" aria-label="Search">
              <button class="btn btn-danger" type="submit">BUSCAR</button>
            </form> --}}
          </div>
        @endif
        
      
        <div class="dropdown" id="navbarSupp  ortedContent">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Menú
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <!-- Authentication Links -->
              @guest
                  @if (Route::has('login'))
                      <li>
                          <a class="dropdown-item" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                      </li>
                  @endif

                  @if (Route::has('register'))
                      <li>
                          <a class="dropdown-item" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                      </li>
                  @endif
              @else
                  <li>
                    
                      <a class="dropdown-item" href="#" role="button">
                          {{ Auth::user()->name }}
                      </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                  </li>
              @endguest
          </ul>
        </div>
      </div>
  </nav>


  
{{-- CENTRAL CONTENT --}}
    <div class="container container-md border border-2 rounded img-fluid body-container">
        <div class="row">
            @yield('content')
        </div>

    </div>
</body>
</html>



<script type="text/javaScript">
  $(document).ready(function(){

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });

  });
</script>