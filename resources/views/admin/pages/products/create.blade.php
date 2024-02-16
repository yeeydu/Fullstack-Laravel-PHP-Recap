@extends('admin.master.main')
@section('content')

@component('admin.components.products.products-form-create', ['subcategories' => $subcategories,'categories' => $categories, 'product' => $product ])

@endcomponent
@endsection
