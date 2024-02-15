@extends('admin.master.main')
@section('content')

@component('admin.components.products.products-form-show', ['product' => $product])

@endcomponent
@endsection
