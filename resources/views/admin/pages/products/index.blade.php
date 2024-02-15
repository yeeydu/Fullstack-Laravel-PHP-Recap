@extends('admin.master.main')
@section('content')

@component('admin.components.products.products-list', ['products' => $products, 'prod_images' => $prod_images])

@endcomponent
@endsection
