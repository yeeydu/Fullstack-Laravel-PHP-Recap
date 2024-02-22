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

    {{-- <div class="m-2">
        <a href="{{ url('admin/page/create') }}" class="btn btn-primary mr-4">Add customer</a>
    </div> --}}

    <h1>Customers</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Is Admin</th>
                    {{-- <th scope="col">Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td scope="row">{{$customer->name}}</td>
                    <td>{{ substr($customer->email ,0, 80) }}</td>

                    <td class="{{ $customer->is_admin ? 'text-success' : ' ' }}">{{$customer->is_admin ? 'Admin' :
                        'User'}}</td>
                    {{-- <td class="">
                        <div class="pr-1 d-inline-flex">
                            <a href="{{url('admin/customer/' . $customer->id)}}" type="button"
                                class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                            @auth
                            <a href="{{url('admin/customer/' . $customer->id . '/edit')}}" type="button"
                                class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <!-----  Desativar Eliminar pagina   ---->
                            <form action="{{ url('admin/customer/' . $customer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger show_confirm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                            @endauth
                        </div>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $customers->links('pagination::bootstrap-4') }}
</div>
