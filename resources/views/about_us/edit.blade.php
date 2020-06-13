@extends('layouts.app')

@section('content')
    <h1 class="display-4">Edit about us</h1>
    <form action="/aboutus/{{ $about->id }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('about_us.form')
        @csrf
    </form>
@endsection
