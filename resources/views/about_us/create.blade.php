@extends('layouts.app')

@section('content')
    <h1 class="display-4">Add about us article</h1>
    <form action="/aboutus" method="POST" enctype="multipart/form-data">
        @include('about_us.form')
        @csrf
    </form>
@endsection