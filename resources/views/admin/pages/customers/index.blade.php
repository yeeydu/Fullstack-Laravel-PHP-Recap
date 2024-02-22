@extends('admin.master.main')
@section('content')

@component('admin.components.customers.customers-list', ['customers' => $customers])

@endcomponent
@endsection
