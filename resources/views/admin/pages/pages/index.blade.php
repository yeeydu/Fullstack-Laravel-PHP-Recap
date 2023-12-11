@extends('admin.master.main')
@section('content')

@component('admin.components.pages.pages-list', ['pages' => $pages])

@endcomponent
@endsection
