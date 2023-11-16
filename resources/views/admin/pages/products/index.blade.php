@extends('admin.master.main')
@section('content')

@component('admin.components.fotografias.fotografias-list', ['fotografias' => $fotografias])

@endcomponent
@endsection
