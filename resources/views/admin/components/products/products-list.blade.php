<div id="" class="container media-content-true">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session("status") }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif @if (session('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session("failed") }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="m-2">
        <a href="{{ url('admin/product/create') }}" class="btn btn-primary mr-4">Add Product</a>
    </div>

    <h1>Products</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Summary</th>
                <th scope="col">Brand</th>
                <th scope="col">Color</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Categories</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td scope="row">{{$product->name}}</td>
                <td>{{ substr($product->summary ,0, 80) }}</td>
                <td>{{ substr($product->brand ,0, 80) }}</td>
                <td>{{ substr($product->color ,0, 80) }}</td>
                <td>{{ substr($product->size ,0, 80) }}</td>
                <td>{{ number_format($product->price, 2)}}€</td>
                <td>C. {{ substr($product->category->title ,0, 80) }}<br>Sub. {{ substr($product->subcategory->title ,0,
                    80) }}</td>
                <td>
                    @if ($prod_images->isEmpty())
                    <p>No Image</p>
                    @else
                        @foreach ($prod_images as $image)
                            @if ($image->product_id == $product->id)
                            <img class="img-fluid" src="{{ asset('storage/' . $image->url) }}" alt="image"
                                style="max-height: 40px" />
                            @endif
                        @endforeach
                    @endif
                </td>
                <td>{{$product->is_active ? 'Active' : 'Inactive'}}</td>
                <td class="">
                    <div class="pr-1 d-inline-flex">
                        <a href="{{url('admin/product/' . $product->id)}}" type="button"
                            class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                        @auth
                        <a href="{{url('admin/product/' . $product->id . '/edit')}}" type="button"
                            class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <!-----  Desativar Eliminar pagina   ---->
                        <form action="{{ url('admin/product/' . $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger show_confirm">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                        @endauth
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links('pagination::bootstrap-4') }}
</div>
