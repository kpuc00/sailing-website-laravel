@extends('layouts.app')

@section('content')
    <h1 class="display-4">Edit a course</h1>
    <form action="/course/{{ $course->id }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('course.form')
    </form>
@endsection
