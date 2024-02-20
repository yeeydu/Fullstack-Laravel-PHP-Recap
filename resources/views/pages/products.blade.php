@extends('master.main')
@section('content')

<div class="container">

    @if($productsPage)
    <div class="mb-4">
        <h1>{{ $productsPage->title }}</h1>

        @if($productsPage->image)
        <div>
            <img class="page_img" src="{{ asset('storage/' . $productsPage->image) }}" alt="{{ $productsPage->title }}">
        </div>
        @endif

        <p>{{ $productsPage->description }}</p>

        @else
        <p> No content!</p>
    </div>
    @endif
    <!--- Products list --->
    @if($products)
    <div>
        <div class="row mx-auto">
            @foreach ($products as $item)
            <div class="col-xl-3 col-lg-4 col-md-6  col-sm-12 mb-4 ">
                @include('pages.productCard')
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

@endsection
