<div class="container">
    <h2>Add Product</h2>
    <a href="{{ url('admin/products') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4">
            <label for="exampleInputPassword1">Name*</label>
            <input type="text" name="name" id="name" autocomplete="name" placeholder="Type name" class="form-control @error('name')
                    is-invalid
                @enderror" value="{{ old('name') }}" required aria-describedby="nameHelp">
            @error('name') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>

        <div class="form-group mb-4">
            <label for="exampleInputPassword1">Summary*</label>

            <textarea rows="4" type="text" name="summary" id="summary" autocomplete="summary"
                placeholder="Type your summary" class="editor form-control  @error('summary')
            is-invalid
            @enderror" value="{{ old('summary') }}" required
                aria-describedby="nameHelp">{{ old('summary') }}</textarea>

            @error('summary') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group mb-4">
            <label for="exampleInputPassword1">Description*</label>

            <textarea rows="10" type="text" name="description" id="description" autocomplete="description"
                placeholder="Type your description" class="editor form-control  @error('description')
            is-invalid
            @enderror" value="{{ old('description') }}" required
                aria-describedby="nameHelp">{{ old('description') }}</textarea>

            @error('description') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="row align-items-start">
            <div class="col mb-4">
                <label for="exampleInputPassword1">Brand*</label>
                <input type="text" name="brand" id="brand" autocomplete="brand" placeholder="Type brand" class="form-control @error('brand')
                    is-invalid
                @enderror" value="{{ old('brand') }}" required aria-describedby="nameHelp">
                @error('brand') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>
            <div class="col mb-4">
                <label for="exampleInputPassword1">Colors*</label>
                <input type="text" name="color" id="color" autocomplete="color" placeholder="Type color" class="form-control @error('color')
                    is-invalid
                @enderror" value="{{ old('color') }}" required aria-describedby="nameHelp">
                @error('color') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>
            <div class="col mb-4">
                <label for="exampleInputPassword1">Size*</label>
                <input type="size" name="size" id="size" autocomplete="size" placeholder="Type size" class="form-control @error('size')
                        is-invalid
                    @enderror" value="{{ old('size') }}" required aria-describedby="nameHelp">
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
                @enderror" value="{{ old('price') }}" required aria-describedby="nameHelp">
                @error('price') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>
            <!--Category-->
             <div class="col mb-4">
                <label for="category">Category*:</label>
                <select class="form-control" id="category_id" name="category_id" @error('category_id') is-invalid @enderror>
                    <option selected value="">Select</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id')  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <!--subcategory-->
            <div class="col mb-4">
                <label for="subcategory">Subcategory*:</label>
                <select class="form-control" id="subcategory_id" name="subcategory_id" @error('subcategory_id') is-invalid @enderror>
                    <option value="">Select</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{  $subcategory->id }}"  @if(old('subcategory_id') == $subcategory->id) selected @endif>{{ $subcategory->title }}</option>
                    @endforeach
                </select>
                @error('subcategory_id')  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col mb-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="sale" id="sale">
                    <label class="form-check-label" for="sale">Sale</label>
                </div>
            </div>
            <div class="col mb-4">
                <label for="exampleInputPassword1">Sale Price €</label>
                <input type="sale_price" name="sale_price" id="sale_price" autocomplete="sale_price" placeholder="€€ sale price" class="form-control @error('prisale_pricece')
                    is-invalid
                @enderror" value=""  aria-describedby="nameHelp">
                @error('sale_price') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>

        </div>
        <div class="row align-items-start">
            <div class="col mb-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active"
                        checked>
                    <label class="form-check-label" for="is_active">Is Active</label>
                </div>
            </div>
            <div class="col mb-4">
                <div class="form-group">
                    <!-----image----->
                    <label for="exampleInputPassword1">Images*</label>
                    <input type="file" multiple name="images[]" id="images" class="form-control @error('images')
                            is-invalid
                        @enderror" value="{{ old('images') }}" aria-describedby="nameHelp">
                    @error('images') <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        @enderror
                </div>
                <!----------->
            </div>
        </div>
        <div>
            <span class="invalid-feedback" role="alert"></span>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
