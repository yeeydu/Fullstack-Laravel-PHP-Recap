<div class="container">
    <h2>Show</h2>
    <a href="{{ url('admin/products') }}" class="btn btn-primary">Back</a>

    <h3 class="mt-4"> {{$product->name}}</h3>
    <div class="row mb-4">
        <div class="col mb-4">
            <strong>Image</strong>
            <div class="w-50">
                @if ($prod_images->isEmpty())
                    <p>No Image</p>
                    @else
                        @foreach ($prod_images as $image)
                            @if ($image->product_id == $product->id)
                            <img class="img-fluid" src="{{ asset('storage/' . $image->url) }}" alt="image"
                                style="max-height: 80px" />
                            @endif
                        @endforeach
                    @endif
            </div>
        </div>
        <div class="col">
            <div>
                <strong>Status</strong>
                @if($product->is_active === 1)
                <p>Active</p>
                @else
                <p>Inactive</p>
                @endif
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
        <div class="col">
            <strong>Price</strong>
            <div class="show-style">
                {{ number_format($product->price, 2)}}€
            </div>
        </div>
        <div class="col">
            <strong>Sale Price</strong>
            <div class="show-style">
                {{ number_format($product->sale_price, 2)}}€
            </div>
        </div>
        <div class="col">
            <strong>Sale</strong>
            @if($product->sale === 1)
            <p>Active</p>
            @else
            <p>Inactive</p>
            @endif
        </div>
    </div>

    </div>
    <strong>Summary</strong>
    <div class="show-style">
        {!!$product->summary!!}
    </div>
    <strong>Description</strong>
    <div class="show-style">
        {!!$product->description!!}
    </div>
</div>
