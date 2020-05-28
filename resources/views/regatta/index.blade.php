@extends('layouts.app')

@section('content')

    @if (Auth::user())
        @if(Auth::user()->isAdmin())
            <div class="row">
                <div class="col">
                    <a href="/regatta/create" class="btn btn-primary">Add regatta</a>
                </div>
            </div>
        @endif
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <ul class="list-group-flush">
                @foreach($regattas as $regatta)
                    <li class="list-group-item" data-role="article">
                        <a href="/regatta/{{ $regatta->id }}" class="btn text-dark list-group-item-action">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $regatta->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            <ul>
            <div class="d-flex justify-content-center py-4">
                {{ $regattas->links() }}
            </div>
        </div>
    </div>

@endsection
