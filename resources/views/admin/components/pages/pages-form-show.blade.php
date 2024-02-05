<div class="container">
    <h2>Show - {{$pages->title}}</h2>
    <a href="{{ url('admin/page') }}" class="btn btn-primary">Back</a>

    <h3>Title</h3>
    <div>
        {{$pages->title}}
    </div>
    <span>Description</span>
    <div class="show-style">
        {!!$pages->description!!}
    </div>

    <label for="exampleInputPassword1">Image</label>
    <div class="w-50 ">
        <!----->
        @if ($pages->image)
        <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $pages->image) }}" alt="image"></td>
        @else
        <p>No Image</p>
        @endif
    </div>
    <!----->
    <div>
        <span class="invalid-feedback" role="alert"></span>
    </div>
    <div>
        {{$pages->is_active}}
    </div>
    </form>
</div>
