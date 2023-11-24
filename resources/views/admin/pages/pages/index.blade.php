@extends('admin.master.main')
@section('content')

@component('admin.components.pages.pages-list', ['page' => $page])

@endcomponent
@endsection
