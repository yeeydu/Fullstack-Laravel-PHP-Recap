@extends('master.main')
@section('content')

<div class="container">

    @if($productsPage)

    <h1>{{ $productsPage->title }}</h1>

    @if($productsPage->image)
    <div>
        <img class="page_img" src="{{ asset('storage/' . $productsPage->image) }}" alt="{{ $productsPage->title }}">
    </div>
    @endif

    <p>{{ $productsPage->description }}</p>

    @else
    <p> No content!</p>
    @endif


    <!--- Products list --->



</div>

@endsection
