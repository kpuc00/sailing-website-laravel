@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            <p class="h4 text-muted">About us:</p>
        </div>
    </div>
    
    @if(count($about) == 0)
        @if (Auth::user())
            @if (Auth::user()->isAdmin())
                <div class="row m-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="/aboutus/create" class="btn btn-primary my-4">Create</a>
                    </div>
                </div>
            @endif
        @endif
            <div class="row">
                <div class="col">
                    <h3>No information available.</h3>
                </div>
            </div>

        @else
        @foreach ($about as $aboutus)
        @if (Auth::user())
            @if (Auth::user()->isAdmin())
            <div class="row m-3">
                <div class="col-lg-6 col-md-6 coc-sm-6">
                    <a href="/aboutus/{{ $aboutus->id }}/edit" class="btn btn-primary mt-4">Edit article</a>
                </div>
                <div class="col-lg-6 col-md-6 coc-sm-6">
                    <form action="/aboutus/{{ $aboutus->id }}" method="POST">
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-4 float-right d-inline">Delete</button>
                        @csrf
                    </form>
                </div>
            </div>
            @endif
        @endif
            <div class="row">
                <div class="col-6">
                    <h3>{{ $aboutus->title }}</h3>
                    <p>{{ $aboutus->content }}</p>
                </div>
                <div class="col-6">
                    <img class="img-fluid" src="{{ asset('storage/'.$aboutus->image) }}" alt="About us image">
                </div>
            </div>
        @endforeach
    @endif

@endsection
