@extends('master.main')
@section('content')

<div class="container">
    <!--- item list --->
    <h3>@if($user){{$user->name}} this are @endif your products</h3>
    <div class="col-md-3 col-sm-12">
        <a href="/ordernow" class="btn btn-outline-success">Order now</a>
    </div>
    @if($itemsList)
    <div class="mt-4 mb-4 pt-4 pb-4">
        @foreach ($itemsList as $item)
        <div class="row mb-3">
            <div class="col-md-5 col-sm-12">

                @foreach ($images as $image)
                @if($image->product_id == $item->id)
                <a href="{{url('products/' . $item->id .'_'.$item->name)}}">
                    <img class="card-img-top hover" src="{{ asset('storage/' . $image->url) }}" alt="image"
                        style="object-fit: cover; width: 40%; " />
                </a>
                @break {{-- Exit the loop after the first image --}}
                @endif

                @endforeach
            </div>
            <div class="col-md-4 col-sm-12">
                <a class="product-title" href="{{url('products/' . $item->id .'_'.$item->name)}}">
                    <h5 class="card-title">{{$item->name}}</h5>
                </a>
                <p class="card-text">{{ number_format( $item->price, 2)}}€</p>
                <p class="card-text">
                    <strong>Brand:</strong> {{ $item->brand}}<br>
                    <strong>Color:</strong> {{ $item->color}}<br>
                </p>
                <p class="card-text">{{ strlen($item->summary) > 60 ? substr($item->summary, 0, 60) . ' ...' :
                    $item->summary }}
                </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <a href="/removeitem/{{$item->cart_id}}" class="btn btn-outline-danger">Remove from cart</a>
            </div>
            <div class="">
                <hr>
            </div>
        </div>
        @endforeach
        <div class="col-md-3 col-sm-12">
            <a href="/ordernow" class="btn btn-outline-success">Order now</a>
        </div>
    </div>
    @else
    <p>please add products to your cart</p>
    @endif
</div>

@endsection
