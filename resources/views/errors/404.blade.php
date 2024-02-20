@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')

@if($exception->getMessage())
<div class="bg-dark text-center">
    <a href="{{ url()->previous()  }}">Back</a>
</div>

@section('message', $exception->getMessage())
@else
@section('message', __('Not Found'))
@endif
