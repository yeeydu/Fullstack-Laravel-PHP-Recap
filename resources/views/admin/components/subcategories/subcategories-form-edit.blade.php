<div id="media" class="container">
    <h2>Edit Subcategory</h2>
    <a href="{{ url('admin/categories') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/subcategories/'. $subcategory->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputPassword1">Titulo</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ $subcategory->title }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">Slug</label>
            <input type="text" name="slug" id="slug" autocomplete="slug" placeholder="Type slug" class="form-control @error('slug')
                    is-invalid
                @enderror" value="{{ $subcategory->slug }}" required aria-describedby="nameHelp">
            @error('slug') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <textarea rows="6" type="text" name="description" id="description" autocomplete="description"
                placeholder="Type your description" class="editor form-control @error('description')
                    is-invalid
                @enderror" value="{{ $subcategory->description }}"
                aria-describedby="nameHelp">{{ $subcategory->description }}</textarea>
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
        <button type="submit" class="btn btn-primary show_confirm_edit mt-2">Update</button>
    </form>
</div>
