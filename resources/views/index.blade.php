@extends('master.main')
@section('content')


<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.pexels.com/photos/18925469/pexels-photo-18925469/free-photo-of-praia-litoral-frio-com-frio.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://images.pexels.com/photos/19035601/pexels-photo-19035601/free-photo-of-pano-de-fundo-contexto-praia-litoral.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://images.pexels.com/photos/18714268/pexels-photo-18714268/free-photo-of-frio-com-frio-gelado-congelado.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                class="d-block w-100" alt="...">
        </div>
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
