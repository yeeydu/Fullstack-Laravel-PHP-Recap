@extends('admin.master.main')
@section('content')

@component('admin.components.subcategories.subcategories-form-show', ['subcategory' => $subcategory] );

@endcomponent
@endsection
