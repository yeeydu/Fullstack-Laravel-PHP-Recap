@extends('admin.master.main')
@section('content')

@component('admin.components.products.products-list', ['products' => $products])

@endcomponent
@endsection
