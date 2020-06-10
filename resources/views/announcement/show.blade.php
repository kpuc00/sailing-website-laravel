@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            <img src="storage/announcement-img/{{ $announcement->image }}" class="img-fluid" alt="...">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="h1">{{ $announcement->title }}</p>
            <blockquote class="blockquote text-center">
                <p class="mb-0">{{ $announcement->content }}</p>
                <footer class="blockquote-footer text-left my-4">Author: {{ $announcement->user->name }}</footer>
            </blockquote>
        </div>
    </div>

    @if (Auth::user())
        @if (Auth::user()->isAuthourOfAnnouncement($announcement->id))
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="/announcement/{{ $announcement->id }}/edit" class="btn btn-primary">Edit</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form action="/announcement/{{ $announcement->id }}" method="POST">
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-right">Delete</button>
                    </form>
                </div>
            </div>
        @endif
    @endif

@endsection
