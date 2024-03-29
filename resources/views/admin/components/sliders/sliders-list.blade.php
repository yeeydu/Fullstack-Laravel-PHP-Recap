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
    <h1>Slideshow</h1>
    <div class="pt-3">
        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary mr-3">Add Slide</a>

    </div>

    <div class="row mt-4">
        <div class="col-md-6 col-sm-8">
            <input class="form-control" id="myFilter" type="text" placeholder="Search">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="sort" scope="col">Title  </th>
                    <th class="hide-with-media" scope="col">Description</th>
                    <th class="hide-with-media" scope="col">Image</th>
                    <th class="hide-with-media" scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th class="sort" scope="col">Order<i class="fa-solid fa-arrow-down-a-z"></i></th>
                </tr>
            </thead>
            <tbody id="listTable">
                @foreach($sliders as $slide)
                <tr>

                    <td class=" ">{{$slide->title}}</td>
                    <td class="hide-with-media">{!! strip_tags(substr($slide->description,0, 40)) !!}</td>
                    <td class="hide-with-media">
                        @if ($slide->image)
                        <img class="img-fluid" src="{{ asset('storage/' . $slide->image) }}" alt="image"
                            style="max-height: 80px">
                        @else
                        <p>No Image</p>
                        @endif
                    </td>
                    <td>
                        {{$slide->is_active ? 'Active' : 'Inactive'}}
                        {{-- <form action="{{route('slider.update-state',['slider' => $slide->id])}}" method="POST"
                            id="published_form">
                            @csrf
                            @method('PUT')
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_active_form{{$slide->id}}"
                                    name="is_active" switch="bool" @if ($slide->is_active == true) checked @endif "
                                value="{{$slide->is_active}}"
                                onclick="this.form.submit();" >
                                <label class="custom-control-label" for="is_active_form{{$slide->id}}">@if
                                    ($slide->is_active ==true) Ocultar @else Publicar @endif</label>
                            </div>
                        </form> --}}
                    </td>
                    <td class=" ">
                        <div class="pr-1 d-lg-inline-flex ">
                            <a href="{{url('admin/sliders/' . $slide->id)}}" type="button"
                                class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                            @auth
                            <a href="{{url('admin/sliders/' . $slide->id . '/edit')}}" type="button"
                                class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{url('admin/sliders/' . $slide->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger show_confirm"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                            @endauth
                        </div>
                    </td>
                    <td>{{ $slide->order}}</td>
                </tr>
                @endforeach
                @if($sliders->count() == 0)
                No Content
                @endif
            </tbody>
        </table>
    </div>
    {{ $sliders->links('pagination::bootstrap-4') }}
</div>
