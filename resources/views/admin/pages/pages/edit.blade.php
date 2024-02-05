@extends('admin.master.main')
@section('content')

@component('admin.components.pages.pages-form-edit', ['pages' => $pages])

@endcomponent
@endsection
