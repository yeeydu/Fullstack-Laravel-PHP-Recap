@extends('admin.master.main')
@section('content')

<div class="container">
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

