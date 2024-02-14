    <h2>Show Subcategory</h2>
    <a href="{{ url('admin/subcategories') }}" class="btn btn-primary mt-2">Back</a>
    <h3 class="mt-4"> {{$subcategory->title}}</h3>

    <strong>Slug</strong>
    <p > {{$subcategory->slug}}</p>

    <strong>Description</strong>
    <div class="show-style mb-2">
        {!!$subcategory->description!!}
    </div>

    <strong>Category - Parent</strong>
    <div class="show-style mb-2">
        {!!$subcategory->parent->title!!}
    </div>

</div>
