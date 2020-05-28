@extends('layouts.app')

@section('content')
    <h1 class="display-4">Edit a course</h1>
    <form action="/regatta/{{ $regatta->id }}" method="POST">
        @method('PATCH')
        @include('regatta.form')
    </form>
@endsection
