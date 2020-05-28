@extends('layouts.app')

@section('content')
    <h1 class="display-4">Edit a coach</h1>
    <form action="coach/{{ $coach->id }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('coach.form')
        @csrf
    </form>
@endsection
