<div class="container">
    <h2>Show - {{$page->title}}</h2>
    <a href="{{ url('admin/page') }}" class="btn btn-primary">Back</a>

    <h3> {{$page->title}}</h3>

    <strong>Description</strong>
    <div class="show-style">
        {!!$page->description!!}
    </div>

    <strong>Image</strong>
    <div class="w-25 ">
        <!----->
        @if ($page->image)
        <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $page->image) }}" alt="image"></td>
        @else
        <p>No Image</p>
        @endif
    </div>
    <!----->
    <div>
        <span class="invalid-feedback" role="alert"></span>
    </div>
    <div>
        @if($page->is_active === 1)
        <p>Active</p>
        @else
        <p>Inactive</p>
        @endif

    </div>
    </form>
</div>
