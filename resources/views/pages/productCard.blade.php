<div class="card" style="width: 18rem; hover">
    @foreach ($images as $image)
    @if($image->product_id == $item->id)
    <a href="{{url('product/' . $item->id .'_'.$item->name)}}">
        <img class="card-img-top hover" src="{{ asset('storage/' . $image->url) }}" alt="image"
            style="object-fit: cover; width: 100%; height: 300px;" />
    </a>
    @break {{-- Exit the loop after the first image --}}
    @endif
    @endforeach
    <div class="card-body">
        <a class="product-title" href="{{url('product/' . $item->id .'_'.$item->name)}}">
            <h5 class="card-title">{{$item->name}}</h5>
        </a>
        <p class="card-text">{{ number_format( $item->price, 2)}}€</p>
        <p class="card-text">
            <strong>Brand:</strong> {{ $item->brand}}<br>
            <strong>Color:</strong> {{ $item->color}}<br>
            <strong>Size:</strong> {{ $item->size}}
        </p>
        <p class="card-text">{{ strlen($item->summary) > 60 ? substr($item->summary, 0, 60) . ' ...' : $item->summary }}
        </p>
        <a href="{{url('product/' . $item->id .'_'.$item->name)}}" class="btn btn-outline-dark">More</a>
    </div>
</div>