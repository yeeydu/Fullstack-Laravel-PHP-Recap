@extends('admin.master.main')
@section('content')

@component('admin.components.products.products-form-edit', ['product' => $product])

@endcomponent
@endsection
