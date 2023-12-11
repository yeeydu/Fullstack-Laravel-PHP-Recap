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

<h1>Pages</h1>
 
<table class="table">
    <thead>
      <tr>
        <th scope="col">Page Name</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Is Active</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row">Name</td>
        <td>Title</td>
        <td>Description</td>
        <td>@Image</td>
        <td>@IsActive</td>
      </tr>
      <tr>
        <td scope="row">Name</td>
        <td>Title</td>
        <td>Description</td>
        <td>@Image</td>
        <td>@IsActive</td>
      </tr>
    </tbody>
  </table>


</div>