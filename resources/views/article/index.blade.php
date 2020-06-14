@extends('layouts.app')

@section('content')
    @if (Auth::user())
        @if (Auth::user()->isAdmin())
            <div class="row py-4">
                <div class="col">
                    <a href="/article/create" class="btn btn-primary">Add article</a>
                </div>
            </div>
        @endif
    @endif



    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <ul class="list-group-flush">
                @foreach($articles as $article)
                    <li class="list-group-item" data-role="article">
                        <a href="/article/{{ $article->id }}" class="btn text-dark list-group-item-action">
                            <div class="media">
                                <img src="{{ asset('storage/'.$article->image) }}" class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $article->title }}</h5>
                                    <p>{{ $article->content }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            <ul>
            <div class="d-flex justify-content-center py-4">
                {{ $articles->links() }}
            </div>
        </div>
    </div>

@endsection

