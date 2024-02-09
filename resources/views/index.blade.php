@extends('master.main')
@section('content')

@if ($sliders->isNotEmpty())
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        @foreach($sliders as $slide)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
            class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide 1"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($sliders as $slide)
        <div class="carousel-item active">
            <a href="{{$slide->link}}" >
            <img src="{{asset('storage/'. $slide->image)}}" class="d-block w-100" alt="Products slides" >
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h1 class="carousel-h1">{{ $slide->title }}</h1>
                <h4 class="carousel-h4">{!! $slide->description !!}</h4>
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
<div class="container">

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

@endsection
