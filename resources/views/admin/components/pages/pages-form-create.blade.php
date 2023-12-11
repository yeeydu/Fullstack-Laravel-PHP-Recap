
<div class="container">
    <h2>Add Page</h2>
    <a href="{{ url('admin/page') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{route('page.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ old('title') }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>

            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Type your description"
            class="editor form-control  @error('description')
            is-invalid
            @enderror"
            value="{{ old('description') }}" required aria-describedby="nameHelp">{{ old('description') }}</textarea>

            @error('description')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="row align-items-start">
            <div class="col">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active" checked>
                    <label class="form-check-label" for="is_active">Is Active</label>
                </div>
            </div>
            <div class="col">
                <div class="form-group"> <!-----image----->
                    <label for="exampleInputPassword1">Image</label>
                    <!---- filenames[]----->
                    <input type="file"  name="image" id="image"
                    class="form-control @error('name')
                            is-invalid
                        @enderror"
                    value="{{ old('image') }}"  aria-describedby="nameHelp">
                    @error('image')  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
                </div> <!----------->
            </div>
        </div>
            <div>
                <span class="invalid-feedback" role="alert"></span>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
