@extends('admin.master.main')
@section('content')

@component('admin.components.categories.categories-form-show', ['category' => $category] );

@endcomponent
@endsection
