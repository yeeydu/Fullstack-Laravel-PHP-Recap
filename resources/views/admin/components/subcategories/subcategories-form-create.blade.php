<div class="container">
    <h2>Add Subcategory</h2>
    <a href="{{ url('admin/subcategories') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('/admin/subcategories')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ old('title') }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">Slug</label>
            <input type="text" name="slug" id="slug" autocomplete="slug" placeholder="Type slug" class="form-control @error('slug')
                    is-invalid
                @enderror" value="{{ old('slug') }}" required aria-describedby="nameHelp">
            @error('slug') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group mt-2">
            <label for="exampleInputPassword1">Description</label>
            <textarea rows="6" type="text" name="description" id="description" autocomplete="description"
                placeholder="Type your description" class="editor form-control @error('address')
                    is-invalid
                @enderror" value="{{ old('description') }}" aria-describedby="nameHelp">{{ old('title') }}</textarea>
            @error('description') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
            <!--.parent id-->
            <div class="form-group">
                <label for="category">Category (parent):</label>
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="">Select</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
