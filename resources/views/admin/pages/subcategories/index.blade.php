@extends('admin.master.main')
@section('content')

@component('admin.components.subcategories.subcategories-list', ['subcategories' => $subcategories] )

@endcomponent
@endsection
