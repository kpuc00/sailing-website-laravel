@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12  m-auto">
            <div class="jumbotron">
                <h1 class="display-4">{{ $coach->firstName . " " . $coach->lastName }}</h1>
                <blockquote class="blockquote text-center">
                    <p class="lead mb-0">{{ $coach->description }}</p>
                </blockquote>
                @if (Auth::user())
                    <div class="row">
                        <div class="col-lg-6 col-md-6 coc-sm-6">
                            <a href="/coach/{{ $coach->id }}/edit" class="btn btn-primary mt-4">Edit coach</a>
                        </div>
                        <div class="col-lg-6 col-md-6 coc-sm-6">
                            <form action="/coach/{{ $coach->id }}" method="POST">
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-4 float-right d-inline">Delete</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="media">
                <img src="storage/course-img/" class="align-self-center mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">{{ $coach->course->name ?? "No course for coresponding coach yet" }}</h5>
                    <p>{{ $coach->course->description ?? "No course description for coresponding coach" }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
