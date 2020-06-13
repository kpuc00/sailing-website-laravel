@extends('layouts.app')

@section('content')
    <h1 class="display-4">Create Announcement</h1>
    <form action="/announcement" method="POST" enctype="multipart/form-data">
        @include('announcement.form')
        @csrf
    </form>
@endsection
