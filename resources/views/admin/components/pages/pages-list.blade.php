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
    <h1>Pages</h1>

    <div class="m-2">
        <a href="{{ url('admin/page/create') }}" class="btn btn-primary mr-4">Add Page</a>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 col-sm-8" >
            <input class="form-control" id="myFilter" type="text" placeholder="Search">
        </div>
    </div>

    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="listTable">
            @foreach($pages as $page)
            <tr>
                <td scope="row">{{$page->title}}</td>
                <td>{{ substr($page->description ,0, 80) }}</td>
                <td>
                    @if ($page->image)
                    <img class="img-fluid" src="{{ asset('storage/' . $page->image) }}" alt="image"
                        style="max-height: 80px" />
                    @else
                    <p>No Image</p>
                    @endif
                </td>
                <td>{{$page->is_active ? 'Active' : 'Inactive'}}</td>
                <td class="">
                    <div class="pr-1 d-inline-flex">
                        <a href="{{url('admin/page/' . $page->id)}}" type="button" class="btn btn-outline-success"><i
                                class="fa-solid fa-eye"></i></a>
                        @auth
                        <a href="{{url('admin/page/' . $page->id . '/edit')}}" type="button"
                            class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <!-----  Desativar Eliminar pagina   ---->
                        <form action="{{ url('admin/page/' . $page->id) }}" method="POST">
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
    </div>
    {{ $pages->links('pagination::bootstrap-4') }}
</div>
