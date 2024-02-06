<div class="container">
    <h2>Edit Page</h2>
    <a href="{{ url('admin/page') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{route('page.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-2">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ $page->title }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>


        <div class="form-group mt-2">
            <label for="exampleInputPassword1">Description</label>

            <textarea rows="14" type="text" name="description" id="description" autocomplete="description"
                placeholder="Type your description" class="editor form-control  @error('description')
            is-invalid
            @enderror" value="{{ $page->description }}" required
                aria-describedby="nameHelp">{{ $page->description }}</textarea>

            @error('description') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="row align-items-start">
            <div class="">
                <label class="form-check-label mt-2" for="is_active">Is Active: {{ $page->is_active ? 'yes' : 'no'
                    }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input " type="checkbox" role="switch" name="is_active" id="is_active"
                        value="{{ $page->is_active ? 'checked' : 'unchecked' }}">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <!-----image----->
                    <label for="exampleInputPassword1">Change Image</label>
                    <!---- filenames[]----->
                    <input type="file" name="image" id="image" class="form-control @error('name')
                            is-invalid
                        @enderror" value="{{ $page->image }}" aria-describedby="nameHelp">
                    @error('image') <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        @enderror
                </div>
                <!----------->
            </div>
            <div class="col">
                <div class="w-50">
                    <!----->
                    @if ($page->image)
                    <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $page->image) }}" alt="image"></td>
                    @else
                    <p>No Image</p>
                    @endif
                </div>
            </div>
        </div>
        <div>
            <span class="invalid-feedback" role="alert"></span>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
