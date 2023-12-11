<div id="" class="container media-content-true">
    {{-- @if (session('status'))
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
    @endif --}}

    <div class="row m-2">
        <a href="{{ url('admin/page/create') }}" class="btn btn-primary mr-4">Add Page</a> 
    </div>

    <h1>Pages</h1>
    
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Is Active</th>
        </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
        <tr>
            <td scope="row">{{$page->title}}</td>
            <td>{{$page->description}}</td>
            <td >
                @if ($page->image)
                    <img class="img-fluid" src="{{ asset('storage/' . $page->image) }}" alt="image" style="max-height: 80px">
                @else
                    <p>No Image</p>  
                @endif
            </td>
            <td>{{$page->is_active ? 'true' : 'false'}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>


</div>