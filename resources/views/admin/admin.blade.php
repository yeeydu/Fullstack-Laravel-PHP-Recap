@extends('admin.master.main')
@section('content')

<div class="container">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header">{{ __('Dashboard') }}</div>
      
                      <div class="card-body">
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif

                          {{ __('You are logged in!') }}
                      </div>
                  </div>
              </div>
          </div>
        </div>
     <div class="row">
        <div class="col">

            <div> <!--- Sliders Component--->  
                @component('admin.components.sliders.sliders-list',['sliders' => $sliders] )
                @endcomponent
            </div>
        </div>
     </div>

</div>
@endsection

