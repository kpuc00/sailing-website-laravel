@extends('layouts.app')

@section('content')
    <h1 class="display-4">Edit a article</h1>
    <form action="article/{{ $article->id }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('article.form')
        @csrf
    </form>
@endsection
