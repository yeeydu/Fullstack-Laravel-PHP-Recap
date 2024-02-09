<div id="media" class="container">
    <h2>Edit fotografia</h2>
    <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/sliders/'. $slider->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputPassword1">Titulo</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ $slider->title }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <textarea rows="6" type="text" name="description" id="description" autocomplete="description"
                placeholder="Type your description" class="editor form-control @error('description')
                    is-invalid
                @enderror" value="{{ $slider->description }}"
                aria-describedby="nameHelp">{{ $slider->description }}</textarea>
            @error('description') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">Link</label>
            <input type="text" name="link" id="link" autocomplete="link" placeholder="https://www.site.com" class="form-control @error('link')
                    is-invalid
                @enderror" value="{{$slider->link }}" required aria-describedby="nameHelp">
            @error('link') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="row align-items-start">
            <div class="">
                <label class="form-check-label mt-2" for="is_active">Is Active: {{ $slider->is_active === 1 ? 'yes' :
                    'no'
                    }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input " type="checkbox" role="switch" name="is_active" id="is_active" {{
                        $slider->is_active === 1 ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="order">Order:</label>
                    <input type="number" class="form-control" id="order" name="order" placeholder="order number" min="0"
                        max="10" @error('order') is-invalid @enderror value="{{$slider->is_active}}"
                        aria-describedby="nameHelp">
                    @error('order') <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        @enderror
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <!-----image----->
                    <label for="exampleInputPassword1">Change Image</label>
                    <!---- filenames[]----->
                    <input type="file" name="image" id="image" class="form-control @error('name')
                            is-invalid
                        @enderror" value="{{ $slider->image }}" aria-describedby="nameHelp">
                    @error('image') <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        @enderror
                </div>
                <!----------->
            </div>
            <div class="col">
                <div class="w-50">
                    <!----->
                    @if ($slider->image)
                    <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $slider->image) }}" alt="image"></td>
                    @else
                    <p>No Image</p>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary show_confirm_edit mt-2">Update</button>
    </form>
</div>
