@extends('admin.master.main')
@section('content')

@component('admin.components.products.products-form-edit', [
'product' => $product,
'prod_images' => $prod_images,
'subcategories' => $subcategories,
'categories' => $categories])

@endcomponent
@endsection
