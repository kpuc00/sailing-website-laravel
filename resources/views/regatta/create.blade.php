@extends('layouts.app')

@section('content')
    <h1 class="display-4">Add a course</h1>
    <form action="/regatta" method="POST" enctype="multipart/form-data">
        @include('regatta.form')
    </form>
@endsection
