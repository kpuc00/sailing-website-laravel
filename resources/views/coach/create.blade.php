@extends('layouts.app')

@section('content')
    <h1 class="display-4">Add a coach</h1>
    <form action="/coach" method="POST" enctype="multipart/form-data">
        @include('coach.form')
        @csrf
    </form>
@endsection
