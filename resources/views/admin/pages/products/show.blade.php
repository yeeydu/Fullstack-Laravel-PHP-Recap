@extends('admin.master.main')
@section('content')

@component('admin.components.products.products-form-show', ['product' => $product, 'prod_images' => $prod_images])

@endcomponent
@endsection
