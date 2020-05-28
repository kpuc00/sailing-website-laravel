@extends('layouts.app')

@section('content')
    <h1 class="display-4">Edit a article</h1>
    <form action="/article" method="POST" enctype="multipart/form-data">
        @include('article.form')
        @csrf
    </form>
@endsection
