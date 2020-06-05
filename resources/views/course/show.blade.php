@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="jumbotron">
                <h1 class="display-4">{{ $course->name }}</h1>
                <blockquote class="blockquote text-center">
                    <p class="lead mb-0">{{ $course->description }}</p>
                </blockquote>
                @if (Auth::user())
                    <div class="row">
                        <div class="col-lg-6 col-md-6 coc-sm-6">
                            <a href="/course/{{ $course->id }}/edit" class="btn btn-primary mt-4">Edit course</a>
                        </div>
                        <div class="col-lg-6 col-md-6 coc-sm-6">
                            <form action="/course/{{ $course->id }}" method="POST">
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


    <div class="row py-4">
        <div class="col-lg-6 col-md-8 col-sm-12 m-auto">
            <ul class="list-group-flush">
                <li class="list-group-item">Monday: 15:30 - 19:00</li>
                <li class="list-group-item">Tuesday: Free</li>
                <li class="list-group-item">Wednesday: 15:30 - 19:00</li>
                <li class="list-group-item">Thurday: Free</li>
                <li class="list-group-item">Friday: 15:30 - 19:00</li>
                <li class="list-group-item">Saturday: 11:30 - 16:00</li>
                <li class="list-group-item">Sunday: 11:30 - 16:00</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="media">
                <img src="{{ asset('storage/coach-img/'.$course->coach->image) }}" width="200" height="200" class="align-self-center mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">{{ $course->coach->firstName ?? "No coach for coresponding course yet" }}</h5>
                    <p>{{ $course->coach->description ?? "No coach description for coresponding course" }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
