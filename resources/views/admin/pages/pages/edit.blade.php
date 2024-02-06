@extends('admin.master.main')
@section('content')

@component('admin.components.pages.pages-form-edit', ['page' => $page])

@endcomponent
@endsection
