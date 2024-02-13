<div class="container">
    <h2>Show Category</h2>
    <a href="{{ url('admin/categories') }}" class="btn btn-primary mt-2">Back</a>
    <h3 class="mt-4"> {{$category->title}}</h3>


    <strong>Description</strong>
    <div class="show-style mb-2">
        {!!$category->description!!}
    </div>

</div>
