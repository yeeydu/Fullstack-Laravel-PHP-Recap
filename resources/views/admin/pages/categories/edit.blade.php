
@extends('admin.master.main')
@section('content')

@component('admin.components.categories.categories-form-edit', ['category' => $category] );

@endcomponent
@endsection
