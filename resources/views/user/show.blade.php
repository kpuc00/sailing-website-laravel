@extends('layouts.app')

@section('content')




        <div class="col-l">
            <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="pills-home-tab" href="/course" role="tab" aria-controls="pills-home" aria-selected="true">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" href="/coach" role="tab" aria-controls="pills-profile" aria-selected="false">Coaches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" href="/regatta" role="tab" aria-controls="pills-contact" aria-selected="false">Regattas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" href="/article" role="tab" aria-controls="pills-contact" aria-selected="false">Articles</a>
                </li>

                @if ($user->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" href="/user" role="tab" aria-controls="pills-contact" aria-selected="false">Accounts</a>
                    </li>
                @endif

            </ul>
        </div>

        <div class="col">

        </div>
    </div>

    <div class="container" style="padding-top: 5%">
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('storage/'.$user->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Profile Picture</h5>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')

                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Username" value="{{ old('name') ?? $user->name }}">
                        <small id="nameHelp" class="form-text text-muted">Your name.</small>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') ?? $user->email }}">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <!-- [image] -->
                    <div class="form-group d-flex flex-column">
                        <label for="">Image:</label>
                        <input type="file" id="image" name="image">

                        @if($errors->has('image'))
                            <label class="alert alert-warning" role="alert">{{ $errors->first('image') }}</label>
                        @endif
                    </div>

                    <button class="btn btn-primary">Edit</button>

                    @csrf
                </form>

                <form action="/user/{{ $user->id }}" class="my-4">
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>

            </div>
        </div>

    </div>
@endsection
