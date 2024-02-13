<div id="media" class="container">
    <h2>Edit Category</h2>
    <a href="{{ url('admin/categories') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/categories/'. $category->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputPassword1">Titulo</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ $category->title }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <textarea rows="6" type="text" name="description" id="description" autocomplete="description"
                placeholder="Type your description" class="editor form-control @error('description')
                    is-invalid
                @enderror" value="{{ $category->description }}"
                aria-describedby="nameHelp">{{ $category->description }}</textarea>
            @error('description') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary show_confirm_edit mt-2">Update</button>
    </form>
</div>
