
@extends('admin.master.main')
@section('content')

@component('admin.components.sliders.slider-form-edit', ['slider' => $slider ]); 

@endcomponent
@endsection