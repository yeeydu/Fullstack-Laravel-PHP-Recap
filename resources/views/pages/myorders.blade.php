@extends('master.main')
@section('content')

<div class="container">
    <!--- item list --->
    <h3>@if($user){{$user->name}} this are @endif your orders</h3>
    @if($orders && count($orders) > 0)
    <div class="mt-4 mb-4 pt-4 pb-4">
        @foreach ($orders as $item)
        <div class="row mb-3">
            <div class="col-md-4 col-sm-12">

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

            </div>
            <div class="col-md-4 col-sm-12">
                <strong>Order Status:</strong>
                <strong>Payment Method:</strong> {{ $item->payment_method}}<br>
                <strong>Payment Status:</strong> {{ $item->payment_status}}<br>
                <strong>Delivery Status:</strong> {{ $item->status}}<br>
                <strong>Address:</strong> {{ $item->address}}<br>
            </div>
            <div class="">
                <hr>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>you have no orders</p>
    @endif
</div>

@endsection
