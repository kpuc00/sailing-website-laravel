@extends('layouts.app')

@section('content')
    <h1 class="display-4">Edit announcement</h1>
    <form action="/announcement/{{ $announcement->id }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('announcement.form')
        @csrf
    </form>
@endsection
