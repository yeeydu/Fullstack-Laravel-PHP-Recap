@extends('master.main')
@section('content')

@if ($sliders->isNotEmpty())
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        @foreach($sliders as $index => $slide)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}"
            class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide {{ $loop->index + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($sliders as $index => $slide)
        <div class="carousel-item active">
            <a href="{{$slide->link}}">
                <img src="{{asset('storage/'. $slide->image)}}" class="d-block w-100" alt="Products slides">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h1 class="carousel-h1">{{ $slide->title }}</h1>
                <h4 class="carousel-h4">{!! $slide->description !!}</h4>
                <a class="btn btn-outline-secondary btn-sm" href="{{$slide->link}}" role="button">More</a>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endif
<div class="container mt-5 mb-5 pt-5 pb-5">

    @if($home)

    <h1>{{ $home->title }}</h1>
    @if($home->image)
    <div>
        <img class="page_img" src="{{ asset('storage/' . $home->image) }}" alt="{{ $home->title }}">
    </div>
    @endif
    <p>{{ $home->description }}</p>
    @else
    <p> No content!</p>
    @endif
</div>

<div class="bg-dark p-4">
    <div class="container mt-5 mb-5">
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
        @else
        <h5>No products</h5>
        @endif
        <div class="text-center">
            <a href="/products">
            <button class="btn btn-outline-info" >More Products</button>
            </a>
        </div>
    </div>
</div>

@endsection
