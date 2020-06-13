@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            <p class="h4 text-muted">About us:</p>
        </div>
    </div>
    @if (Auth::user())
        @if (Auth::user()->isAdmin())
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="/aboutus/create" class="btn btn-primary my-4">Add</a>
                </div>
            </div>
        @endif
    @endif


    <div class="row">
        <div class="col">
            @foreach ($about as $aboutus)
                <img src="{{ Storage::url($aboutus->image) }}" alt="About us image">
                <h3>{{ $aboutus->title }}</h3>
                <p>{{ $aboutus->content }}</p>
            @endforeach
        </div>
    </div>

@endsection
