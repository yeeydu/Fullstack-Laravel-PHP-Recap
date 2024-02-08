@extends('master.main')
@section('content')

<div class="container">

    @if($contact)

    <h1>{{ $contact->title }}</h1>

    @if($contact->image)
    <div>
        <img class="page_img" src="{{ asset('storage/' . $contact->image) }}" alt="{{ $contact->title }}">
    </div>
    @endif

    <p>{{ $contact->description }}</p>

    @else
    <p> No content!</p>
    @endif


</div>
@endsection
