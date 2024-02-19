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
    <h1>SubCategories</h1>
    <div class="pt-3">
        <a href="{{ url('admin/subcategories/create') }}" class="btn btn-primary mr-3">Add Subcategory</a>

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
                    <th class="hide-with-media" scope="col">Category(parent)</th>
                    <th scope="col">Action</th>
                    <th class="sort" scope="col">Order<i class="fa-solid fa-arrow-down-a-z"></i></th>
                </tr>
            </thead>
            <tbody id="listTable">
                @foreach($subcategories as $subcategory)
                <tr>

                    <td class=" ">{{$subcategory->title}}</td>
                    <td class="hide-with-media">{!! strip_tags(substr($subcategory->description,0, 40)) !!}</td>
                    <td class="hide-with-media">{!! strip_tags(substr($subcategory->slug,0, 40)) !!}</td>
                    <td class="hide-with-media">{!! strip_tags(substr($subcategory->parent->title,0, 40)) !!}</td>
                    <td class=" ">
                        <div class="pr-1 d-lg-inline-flex ">
                            <a href="{{url('admin/subcategories/' . $subcategory->id)}}" type="button"
                                class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                            @auth
                            <a href="{{url('admin/subcategories/' . $subcategory->id . '/edit')}}" type="button"
                                class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{url('admin/subcategories/' . $subcategory->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger show_confirm"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                            @endauth
                        </div>
                    </td>
                    <td>{{ $subcategory->order}}</td>
                </tr>
                @endforeach
                @if($subcategories->count() == 0)
                No Content
                @endif
            </tbody>
        </table>
    </div>
    {{ $subcategories->links('pagination::bootstrap-4') }}
</div>
