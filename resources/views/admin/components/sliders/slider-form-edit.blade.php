
<div id="media" class="container">
    <h2>Edit fotografia</h2>
    <a href="{{ url('admin/') }}" class="btn btn-primary">Back</a>
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
            <textarea rows="6" type="text"  name="description" id="description" autocomplete="description" placeholder="Type your description"
            class="editor form-control @error('description')
                    is-invalid
                @enderror"
            value="{{ $slider->description }}"  aria-describedby="nameHelp">{{ $slider->description }}</textarea>
            @error('description')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div>
             <div class="form-group"> <!-----image----->
                <label for="exampleInputPassword1">Imagem</label>
                <!---- filenames[]----->
                <input type="file"  name="image" id="image"
                class="form-control @error('name')
                        is-invalid
                    @enderror"
                value="{{ $slider->image }}"  aria-describedby="nameHelp">
                @error('image')  <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div> <!----------->
        <div class="w-50 "> <!-- show player image--->
             @if ($slider->image)
                <img class=" w-25  img-thumbnail" src="{{ asset('storage/' . $slider->image) }}" alt="image"></td>
             @else
                <p>No Image</p>
            @endif
        </div>
            <div>
                <span class="invalid-feedback" role="alert"></span>
            </div>
            <button type="submit" class="btn btn-primary show_confirm_edit">Update</button>
    </form>
</div>
