
@extends('admin.master.main')
@section('content')

@component('admin.components.subcategories.subcategories-form-create', ['categories' => $categories]);

@endcomponent
@endsection
