@extends('admin.master.main')
@section('content')

@component('admin.components.categories.categories-list', ['categories' => $categories] )

@endcomponent
@endsection
