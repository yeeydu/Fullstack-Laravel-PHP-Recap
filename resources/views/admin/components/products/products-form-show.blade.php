<div class="container">
    <h2>Show</h2>
    <a href="{{ url('admin/pages') }}" class="btn btn-primary">Back</a>

    <h3 class="mt-4"> {{$page->title}}</h3>
    <div class="row mb-4">
        <div class="col">
            <strong>Image</strong>
            <div class="w-50">
                <!----->
                @if ($page->image)
                <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $page->image) }}" alt="image"></td>
                @else
                <p>No Image</p>
                @endif
            </div>
        </div>
        <div class="col">
            <div>
                <strong>Status</strong>
                @if($page->is_active === 1)
                <p>Active</p>
                @else
                <p>Inactive</p>
                @endif
            </div>
        </div>
    </div>

    <strong>Description</strong>
    <div class="show-style">
        {!!$page->description!!}
    </div>
</div>
