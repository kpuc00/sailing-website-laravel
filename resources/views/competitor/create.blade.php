@extends('layouts.app')

@section('content')
    <h1 class="display-4">Take part in: {{ App\Regatta::GetById($_GET['regatta_id'])->name }}</h1>
    <form action="/competitor" method="POST">
        @include('competitor.form')
        @csrf
    </form>
@endsection
