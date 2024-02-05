@extends('admin.master.main')
@section('content')

@component('admin.components.pages.pages-form-show', ['pages' => $pages])

@endcomponent
@endsection
