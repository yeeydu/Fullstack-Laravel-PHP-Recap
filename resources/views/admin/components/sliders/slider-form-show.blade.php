
<div class="container">
    <h2>Show Slide</h2>
    <a href="{{ url('admin/') }}" class="btn btn-primary">Back</a>
      
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text"  name="title" id="title" autocomplete="title" value="{{$slider->title}}"
            class="form-control @error('title')
                    is-invalid
                @enderror"
            value="{{ old('title') }}" required aria-describedby="nameHelp">
            @error('title')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div>
        <span>Description</span>
        <div class="show-style">
                {!!$slider->description!!}
        </div>

        <label for="exampleInputPassword1">Image</label>
        <div class="w-50 "> <!----->
             @if ($slider->image)
                <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $slider->image) }}" alt="image"></td>
             @else
                <p>No Image</p>  
            @endif
        </div> <!----->
        <div>
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </form>
</div>



