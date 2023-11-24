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
        <div class="row p-3">
            <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary mr-3">Adicionar Slide</a>
            <p >Adicione e altere a slides à homepage "titulo, descrição e imagem"</p>
        </div>

        <div class="row">
            <div class="col-3">
                <input class="form-control" id="myFilter" type="text" placeholder="Pesquisa"> <br>
            </div>
        </div>

        <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="sort" scope="col">Titulo <i class="fa-solid fa-arrow-down-a-z"></i></th>  
                        <th class="hide-with-media" scope="col">Descrição</th>
                        <th class="hide-with-media" scope="col">Imagem</th>
                        <th scope="col">Action</th>
                        <th class="sort" scope="col">Publicação<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    </tr>
                    </thead>
                    <tbody id="listTable">
                    @foreach($sliders as $slide)
                        <tr>

                            <td class=" ">{{$slide->title}}</td>
                            <td class="hide-with-media">{!! strip_tags(substr($slide->description,0, 40)) !!}</td>   
                            <td class="hide-with-media">
                            @if ($slide->image)
                                <img class="img-fluid"  src="{{ asset('storage/' . $slide->image) }}"  alt="image" style="max-height: 80px">
                              @else
                              <p>No Image</p>
                              @endif
                            </td>
                            <td class=" ">
                                <div class="pr-1 d-lg-inline-flex ">
                                    <a href="{{url('admin/sliders/' . $slide->id)}}" type="button" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                                    @auth
                                    <a href="{{url('admin/sliders/' . $slide->id . '/edit')}}" type="button" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{url('admin/sliders/' . $slide->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger show_confirm"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    @endauth
                                </div>
                                </td>
                                <td>
                                <form action="{{route('slider.update-state',['slider' => $slide->id])}}" method="POST" id="published_form">
                                    @csrf
                                    @method('PUT')
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_active_form{{$slide->id}}" name="is_active" switch="bool" @if ($slide->is_active ==true) checked @endif " value="{{$slide->is_active}}"  onclick="this.form.submit();">
                                        <label class="custom-control-label" for="is_active_form{{$slide->id}}">@if ($slide->is_active ==true) Ocultar @else Publicar @endif</label>
                                    </div>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $sliders->links() }}
            </div>
        </div>
</div>


