
@extends('admin.master.main')
@section('content')

@component('admin.components.subcategories.subcategories-form-edit', ['subcategory' => $subcategory, 'categories' => $categories] );

@endcomponent
@endsection
