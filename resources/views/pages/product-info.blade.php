@extends('master.main')
@section('content')

<div class="container mb-8 ">
    <a href="{{ url('products') }}" class="btn btn-primary mt-4">Back</a>

    <h3 class="mt-4"> {{$product->name}}</h3>
    <div class="row mb-5 pb-5">

        <div class="col-lg-6 mb-lg-4">
            <strong>Images</strong>
            <div class="w-auto">
                @if ($prod_images->isEmpty())
                <p>No Image</p>
                @else
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @foreach ($prod_images as $index => $image)
                            @if ($image->product_id == $product->id)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide {{ $loop->index + 1 }}"></button>
                            @endif
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($prod_images as $index => $image)
                            @if ($image->product_id == $product->id)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img class="figure-img img-fluid rounded" style="object-fit: cover; width: 100%;" src="{{ asset('storage/' . $image->url) }}" alt="{{ $product->name }}" />
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <div class="col-sm-6 mb-sm-4 mt-4">
                    <strong>Price</strong>
                    <div class="show-style">
                        {{ number_format($product->price, 2)}}€
                    </div>
                </div>
                @if($product->sale_price > 0)
                <div class="col-sm-6 mb-sm-4">
                    <strong>Sale Price</strong>
                    <div class="show-style">
                        {{ number_format($product->sale_price, 2)}}€
                    </div>
                </div>
                @endif
                <div class="col-sm-6 mb-sm-4">
                    <strong>Brand</strong>
                    <div class="col-sm-6 mb-sm-4">
                        {!!$product->brand!!}
                    </div>

                    <strong>Color</strong>
                    <div class="col-sm-6 mb-sm-4">
                        {!!$product->color!!}
                    </div>

                    <strong>Size</strong>
                    <div class="col-sm-6 mb-sm-4">
                        {!!$product->size!!}
                    </div>
                    <form action="/add_to_cart" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product['id']}}">
                        <button class="btn btn-outline-dark">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm-6 mb-sm-4">
                <strong>Category</strong>
                <div class="show-style">
                    {!!$product->category->title!!}
                </div>
            </div>
            <div class="col-sm-6 mb-sm-4">
                <strong>Subcategory</strong>
                <div class="show-style">
                    {!!$product->subcategory->title!!}
                </div>
            </div>
        </div>

        <strong>Summary</strong>
        <div class="col-sm-12">
            {!!$product->summary!!}
        </div>
        <strong>Description</strong>
        <div class="col-sm-12">
            {!!$product->description!!}
        </div>

    </div>

    @endsection
