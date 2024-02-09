@extends('admin.master.main')
@section('content')

<div class="container">

    <div>
        <!--- Sliders Component--->
        @component('admin.components.sliders.sliders-list',['sliders' => $sliders] )
        @endcomponent
    </div>
</div>
@endsection
