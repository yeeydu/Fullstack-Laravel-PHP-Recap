@extends('admin.master.main')
@section('content')

@component('admin.components.pages.pages-form-create', ['pages' => $pages])

@endcomponent
@endsection
