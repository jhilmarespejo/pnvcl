@extends('layouts.template')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel') }}</div>
                
                <div class="card-body">
                    
                    @if (Auth::user())
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            Bienvenido <strong>{{Auth::user()->name}}</strong>
                            <br>
                        </div>
                    @else
                        <div class="alert alert-danger" role="alert">
                            Bienvenido <strong> Porfavor inicie Sesión</strong>
                        </div>
                    @endif

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
