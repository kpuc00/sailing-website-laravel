@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            <p class="h4 text-muted">Coaches:</p>
        </div>
    </div>
    @if (Auth::user())
        @if (Auth::user()->isAdmin())
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="/coach/create" class="btn btn-primary my-4">Add a coach</a>
                </div>
            </div>
        @endif
    @endif


    <div class="row">
        @foreach ($coaches as $coach)
            <div class="col-lg-4 col-md-4 col-sm-6">
                @include('layouts.card.coach')
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center py-4">
                {{ $coaches->links() }}
            </div>
        </div>
    </div>

@endsection
