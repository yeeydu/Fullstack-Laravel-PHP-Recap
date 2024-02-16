<div class="container">
    <h2>Edit Page</h2>
    <a href="{{ url('admin/products') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{route('product.update', ['id' => $product])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group mb-4">
            <label for="exampleInputPassword1">Name*</label>
            <input type="text" name="name" id="name" autocomplete="name" placeholder="Type name" class="form-control @error('name')
                    is-invalid
                @enderror" value="{{ $product->name }}" required aria-describedby="nameHelp">
            @error('name') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>

        <div class="form-group mb-4">
            <label for="exampleInputPassword1">Summary*</label>

            <textarea rows="4" type="text" name="summary" id="summary" autocomplete="summary"
                placeholder="Type your summary" class="editor form-control  @error('summary')
            is-invalid
            @enderror" value="{{ $product->summary }}" required
                aria-describedby="nameHelp">{{ $product->summary }}</textarea>

            @error('summary') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group mb-4">
            <label for="exampleInputPassword1">Description*</label>

            <textarea rows="10" type="text" name="description" id="description" autocomplete="description"
                placeholder="Type your description" class="editor form-control  @error('description')
            is-invalid
            @enderror" value="{{ $product->description }}" required
                aria-describedby="nameHelp">{{ $product->description }}</textarea>

            @error('description') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="row align-items-start">
            <div class="col mb-4">
                <label for="exampleInputPassword1">Brand*</label>
                <input type="text" name="brand" id="brand" autocomplete="brand" placeholder="Type brand" class="form-control @error('brand')
                    is-invalid
                @enderror" value="{{ $product->brand }}" required aria-describedby="nameHelp">
                @error('brand') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>
            <div class="col mb-4">
                <label for="exampleInputPassword1">Colors*</label>
                <input type="text" name="color" id="color" autocomplete="color" placeholder="Type color" class="form-control @error('color')
                    is-invalid
                @enderror" value="{{ $product->color }}" required aria-describedby="nameHelp">
                @error('color') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>
            <div class="col mb-4">
                <label for="exampleInputPassword1">Size*</label>
                <input type="size" name="size" id="size" autocomplete="size" placeholder="Type size" class="form-control @error('size')
                        is-invalid
                    @enderror" value="{{$product->size  }}" required aria-describedby="nameHelp">
                @error('size') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col mb-4">
                <label for="exampleInputPassword1">Price* €</label>
                <input type="price" name="price" id="price" autocomplete="price" placeholder="price €" class="form-control @error('price')
                    is-invalid
                @enderror" value="{{ $product->price }}" required aria-describedby="nameHelp">
                @error('price') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>
            <!--Category-->
            <div class="col mb-4">
                <label for="category">Category*:</label>
                <select class="form-control" id="category_id" name="category_id" @error('category_id') is-invalid
                    @enderror>
                    <option selected value="">Select</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : ''}}>{{
                        $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>
            <!--subcategory-->
            <div class="col mb-4">
                <label for="subcategory">Subcategory*:</label>
                <select class="form-control" id="subcategory_id" name="subcategory_id" @error('category_id') is-invalid
                    @enderror>
                    <option value="">Select</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected'
                        : ''}}>{{ $subcategory->title }}</option>
                    @endforeach
                </select>
                @error('subcategory_id') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col mb-4">
                <label class="form-check-label mt-2" for="sale">Sale: {{ $product->sale === 1 ? 'yes' :
                    'no'
                    }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input " type="checkbox" role="switch" name="sale" id="sale" {{
                        $product->sale === 1 ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col mb-4">
                <label for="exampleInputPassword1">Sale Price €</label>
                <input type="sale_price" name="sale_price" id="sale_price" autocomplete="sale_price"
                    placeholder="€€ sale price" class="form-control @error('prisale_pricece')
                    is-invalid
                @enderror" value="{{ old('sale_price') }}" aria-describedby="nameHelp">
                @error('sale_price') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>

        </div>
        <div class="row align-items-start">
            <div class="col mb-4">
                <label class="form-check-label mt-2" for="is_active">Is Active: {{ $product->is_active === 1 ? 'yes' :
                    'no'
                    }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input " type="checkbox" role="switch" name="is_active" id="is_active" {{
                        $product->is_active === 1 ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col mb-4">
                <div class="form-group">
                    <!-----image----->
                    <label for="exampleInputPassword1">Images*</label>
                    <input type="file" multiple name="images[]" id="images" class="form-control @error('images')
                            is-invalid
                        @enderror" aria-describedby="nameHelp">
                    @error('images') <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        @enderror
                </div>
            </div>
            <!----------->
            <div class="col mb-4">
                <strong>Image</strong>
                <div class="w-50">
                    @if ($prod_images->isEmpty())
                    <p>No Image</p>
                    @else
                    @foreach ($prod_images as $image)
                    @if ($image->product_id == $product->id)
                    <img class="img-fluid" src="{{ asset('storage/' . $image->url) }}" alt="image"
                        style="max-height: 80px" />
                    {{-- <form action="{{ route('delete.image', $image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem; "
                            class="btn btn-outline-danger btn-sm" type="submit">
                            X
                        </button>
                    </form> --}}
                    @endif
                    @endforeach
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
