<div id="media" class="container media-content-true">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <h1>Categories</h1>
    <div class="pt-3">
        <a href="{{ url('admin/categories/create') }}" class="btn btn-primary mr-3">Add Category</a>

    </div>

    <div class="row mt-4">
        <div class="col-3">
            <input class="form-control" id="myFilter" type="text" placeholder="Search"> <br>
        </div>
    </div>

    <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="sort" scope="col">Title <i class="fa-solid fa-arrow-down-a-z"></i></th>
                        <th class="hide-with-media" scope="col">Description</th>
                        <th class="hide-with-media" scope="col">Slug</th>
                        <th scope="col">Action</th>
                        <th class="sort" scope="col">Order<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    </tr>
                </thead>
                <tbody id="listTable">
                    @foreach($categories as $category)
                    <tr>

                        <td class=" ">{{$category->title}}</td>
                        <td class="hide-with-media">{!! strip_tags(substr($category->description,0, 40)) !!}</td>
                        <td class="hide-with-media">{!! strip_tags(substr($category->slug,0, 40)) !!}</td>
                        <td class=" ">
                            <div class="pr-1 d-lg-inline-flex ">
                                <a href="{{url('admin/categories/' . $category->id)}}" type="button"
                                    class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                                @auth
                                <a href="{{url('admin/categories/' . $category->id . '/edit')}}" type="button"
                                    class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{url('admin/categories/' . $category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger show_confirm"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                                @endauth
                            </div>
                        </td>
                        <td>{{ $category->order}}</td>
                    </tr>
                    @endforeach
                    @if($categories->count() == 0)
                    No Content
                    @endif
                </tbody>
            </table>
        </div>
            {{ $categories->links('pagination::bootstrap-4') }}
</div>
