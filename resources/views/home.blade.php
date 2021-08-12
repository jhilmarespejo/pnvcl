@extends('layouts.template')
@section('title', 'Home')
@section('content')

<style type="text/css">
div#body_container > div {
     padding: 2%;
    background-color: transparent !important;
    box-shadow: none !important
}
a.col{
    height: 7rem;
    /* background-color: red; */
}
</style>

<div class="container text-center" style="margin-top: 23%;">

    <div class="container c1" style="">
        <div class="row">
            <a class="col" href="/paciente/create"></a>
            <div class="col">                
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            <a class="col" href="/reportes/index"></a>
            
        </div>
    </div>
    <div class="container c2" style="margin-top: 5%;">
        <div class="row">
            <a href="/paciente/index" class="text-decoration-none col"></a>
            <div class="col"></div>
            <a href="/paciente/index" class="text-decoration-none col"></a>
            
        </div>
    </div>
    <div class="container c3" style="margin-top: -1%;">
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
            </div>
            <a href="/paciente/index" class="text-decoration-none col"></a>
            <div class="col">
            </div>
            <div class="col">
            </div>
        </div>
    </div>

   {{--  <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:5rem; opacity: 0.88;">
            <div class="card">
                <div class="card-header">{{ __('Panel') }}</div>
                
                <div class="card-body">
                    
                    @if (Auth::user())

                        @if(Session::has('success'))
                            <div class="alert alert-info" role="alert">
                                <strong>{{Session::get('success') }}</strong>
                            </div>                    
                        @else
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                Bienvenido <strong>{{Auth::user()->name}}</strong>
                                <br>
                            </div>  
                        @endif

                    @else
                        <div class="alert alert-danger" role="alert" >
                            Bienvenido <strong> Porfavor inicie Sesión</strong>
                        </div>
                    @endif

                   
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection

