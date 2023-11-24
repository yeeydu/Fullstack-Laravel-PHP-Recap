@extends('admin.master.main')
@section('content')

@component('admin.components.sliders.sliders-list', ['sliders' => $sliders] )

@endcomponent
@endsection
