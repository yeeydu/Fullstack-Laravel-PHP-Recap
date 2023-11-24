
<div class="container">
    <h2>Add Slide</h2>
    <a href="{{ url('admin/') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/sliders')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Titulo</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ old('title') }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <textarea rows="6" type="text"  name="description" id="description" autocomplete="description" placeholder="Type your description"
            class="editor form-control @error('address')
                    is-invalid
                @enderror"
            value="{{ old('description') }}"  aria-describedby="nameHelp">{{ old('title') }}</textarea>
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
            value="{{ old('image') }}"  aria-describedby="nameHelp">
            @error('image')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div> <!----------->
            <div>
                <span class="invalid-feedback" role="alert"></span>
            </div>

            <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" switch="bool">
            <label class="custom-control-label" for="is_active">Publicar</label>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
