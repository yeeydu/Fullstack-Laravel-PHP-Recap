<div class="container">
    <h2>Add Slide</h2>
    <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('/admin/sliders')}}" enctype="multipart/form-data">
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
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">Link</label>
            <input type="text" name="link" id="link" autocomplete="link" placeholder="http://www." class="form-control @error('link')
                    is-invalid
                @enderror" value="{{ old('link') }}" required aria-describedby="nameHelp">
            @error('link') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="row  mt-2">
            <div class="col">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active"
                        checked>
                    <label class="form-check-label" for="is_active">Is Active</label>
                </div>
            </div>
            <div class="col">
                    <div class="form-group">
                        <label for="order">Order:</label>
                        <input type="number" class="form-control" id="order" name="order"
                            placeholder="order number" min="0" max="10" @error('order')
                            is-invalid
                        @enderror" value="{{ old('order') }}" aria-describedby="nameHelp">
                        @error('order') <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            @enderror
                    </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <!-----image----->
                    <label for="exampleInputPassword1">Image</label>
                    <!---- filenames[]----->
                    <input type="file" name="image" id="image" class="form-control @error('name')
                    is-invalid
                @enderror" value="{{ old('image') }}" aria-describedby="nameHelp">
                    @error('image') <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        @enderror
                </div>
            </div>
            <!----------->
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
