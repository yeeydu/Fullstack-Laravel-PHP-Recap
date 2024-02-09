<div class="container">
    <h2>Show Slide</h2>
    <a href="{{ url('admin/dashboard') }}" class="btn btn-primary mt-2">Back</a>
    <h3 class="mt-4"> {{$slider->title}}</h3>
    <div class="row mb-4">
        <div class="col">
            <strong>Image</strong>
            <div class="w-50">
                <!----->
                @if ($slider->image)
                <img class="w-100 img-thumbnail" src="{{ asset('storage/' . $slider->image) }}" alt="image"></td>
                @else
                <p>No Image</p>
                @endif
            </div>
        </div>
        <div class="col">
            <div>
                <strong>Status</strong>
                @if($slider->is_active === 1)
                <p>Active</p>
                @else
                <p>Inactive</p>
                @endif
            </div>
            <div>
                <strong>Order</strong>
                <span>{{$slider->order}}</span>
            </div>
        </div>
    </div>

    <strong>Description</strong>
    <div class="show-style">
        {!!$slider->description!!}
    </div>
</div>
