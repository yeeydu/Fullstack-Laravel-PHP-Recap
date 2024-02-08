@extends('master.main')
@section('content')

<div class="container">

    @if($about)

    <h1>{{ $about->title }}</h1>

    @if($about->image)
    <div>
        <img class="page_img" src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}">
    </div>
    @endif

    <p>{{ $about->description }}</p>

    @else
    <p> No content!</p>
    @endif

</div>

@endsection
