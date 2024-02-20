@extends('master.main')
@section('content')

<div class="container mb-8">
    <h2>Show</h2>
    <a href="{{ url('products') }}" class="btn btn-primary">Back</a>

    <h3 class="mt-4"> {{$product->name}}</h3>
    <div class="row mb-4">
        <div class="col mb-4">
            <strong>Image</strong>
            <div class="w-100">
                @if ($prod_images->isEmpty())
                <p>No Image</p>
                @else
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($prod_images as $index =>  $image)
                        @if ($image->product_id == $product->id)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $index }}" class="@if ($loop->first) active @endif"
                            aria-current="true" aria-label="Slide {{ $loop->index+ 1 }}"></button>
                            @endif
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($prod_images as $key => $image)
                        @if ($image->product_id == $product->id)
                        <div class="carousel-item active">
                            <img class="img-fluid" src="{{ asset('storage/' . $image->url) }}" alt="image"   />
                        </div>

                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @endif
            </div>
        </div>
        <div class="col">
            <div>
                <div class="col">
                    <strong>Price</strong>
                    <div class="show-style">
                        {{ number_format($product->price, 2)}}€
                    </div>
                </div>
                @if($product->sale_price > 0)
                <div class="col">
                    <strong>Sale Price</strong>
                    <div class="show-style">
                        {{ number_format($product->sale_price, 2)}}€
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <strong>Brand</strong>
            <div class="show-style">
                {!!$product->brand!!}
            </div>
        </div>
        <div class="col">
            <strong>Color</strong>
            <div class="show-style">
                {!!$product->color!!}
            </div>
        </div>
        <div class="col">
            <strong>Size</strong>
            <div class="show-style">
                {!!$product->size!!}
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col mb-4">
            <strong>Category</strong>
            <div class="show-style">
                {!!$product->category->title!!}
            </div>
        </div>
        <div class="col mb-4">
            <strong>Subcategory</strong>
            <div class="show-style">
                {!!$product->subcategory->title!!}
            </div>
        </div>
    </div>

    <strong>Summary</strong>
    <div class="show-style">
        {!!$product->summary!!}
    </div>
    <strong>Description</strong>
    <div class="mb-8">
        {!!$product->description!!}
    </div>
</div>

@endsection
