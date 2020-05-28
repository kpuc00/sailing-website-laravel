@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            <img src="storage/article-img/{{ $article->image }}" class="img-fluid" alt="...">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="h1">{{ $article->title }}</p>
            <blockquote class="blockquote text-center">
                <p class="mb-0">{{ $article->content }}</p>
                <footer class="blockquote-footer text-left my-4">Author: {{ $article->user->name }}</footer>
            </blockquote>
        </div>
    </div>

@endsection
