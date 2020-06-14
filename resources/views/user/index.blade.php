@extends('layouts.app')

@section('content')



    <div class="row my-4">
        <div class="row">
            <div class="col m-auto">
                <p class="h4 text-muted">All accounts:</p>
            </div>
        </div>

        <div class="row m-auto">
            @foreach (App\User::GetAllNotSelf(Auth::user()) as $user)
                <div class="col-lg-4 col-md-4 col-sm-6 my-2 mx-auto">

                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/'.$user->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>

                            </div>
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item">Email: {{ $user->email }}</li>
                                <li class="list-group-item">Role: {{ $user->role }}</li>
                                </ul>
                                <div class="card-body">

                                <form action="/user/{{ $user->id }}/changeRole" method="POST">
                                    @method('PATCH')
                                    <button class="btn btn-primary">{{ $user->role == 'admin' ? "Set role to user" : "Set role to admin" }}</button>
                                    @csrf
                                </form>
                            </div>
                        </div>

                </div>
            @endforeach
        </div>
    </div>

@endsection
