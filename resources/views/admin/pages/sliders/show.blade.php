
@extends('admin.master.main')
@section('content')

@component('admin.components.sliders.slider-form-show', ['slider' => $slider]); 

@endcomponent
@endsection