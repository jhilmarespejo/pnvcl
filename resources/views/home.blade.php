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
                        <div class="alert alert-danger" role="alert">
                            Bienvenido <strong> Porfavor inicie Sesión</strong>
                        </div>
                    @endif

                   
                </div>
            </div>
        </div>
    </div>



    <form class="row g-3 needs-validation" novalidate>
        
        
        <div class="col-md-3">
          <label for="validationCustom05" class="form-label">Zip</label>
          <input type="text" class="form-control" id="validationCustom05" required>
          <div class="invalid-feedback">
            Please provide a valid zip.
          </div>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form>
</div>
@endsection


