@extends('master.main')
@section('content')

<div class="container ">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
            </button>
        </div> 
        @endif
        <h1>Players</h1>
        <a href="{{ url('players/create') }}" class="btn btn-primary">Add Player</a>
        <div class="row ">
            <div class=".col-12 ">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Retired</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($players as $player)
                        <tr>
                            <th scope="row">{{$player->id}}</th>
                            <td>{{$player->name}}</td>
                            <td>{{$player->address}}</td>
                            <td>
                            @if ($player->retired)
                                <i class="bi bi-emoji-laughing btn-outline-primary btn-sm"></i>
                            @else
                                <i class="bi bi-emoji-frown btn-outline-danger btn-sm"></i>
                            @endif
                            </td>
                            <td>
                                <div class="pr-1 d-lg-inline-flex ">
                                    <a href="{{url('players/' . $player->id)}}" type="button" class="btn btn-success">Show</a>
                                    <a href="{{url('players/' . $player->id . '/edit')}}" type="button" class="btn btn-primary">Edit</a>
                                    <form action="{{url('players/' . $player->id)}}" method="POST"> 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button> 
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $players->links() }}
            </div>
        </div>
</div>

    @endsection
