@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">

        </div>
    </div>

    <div class="row">
        <div class="col">

        </div>

        <div class="col-l">
            <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" href="/course" role="tab" aria-controls="pills-home" aria-selected="true">Courses</a>
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
            </ul>
        </div>

        <div class="col">

        </div>
    </div>

    <div class="container" style="padding-top: 5%">
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Profile Picture</h5>
                        <a href="#" class="btn btn-primary">Change picture</a>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <form action="">

                    @csrf

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Username">
                        <small id="usernameHelp" class="form-text text-muted">Your Username.</small>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="1234567">
                        <small id="phoneHelp" class="form-text text-muted">Your Number.</small>
                    </div>

                    <div class="form-group">
                        <label for="displayname">Display Name</label>
                        <input type="text" class="form-control" id="displayname" aria-describedby="displaynameHelp" placeholder="Name">
                        <small id="displaynameHelp" class="form-text text-muted">Your Display Name.</small>
                    </div>

                </form>
            </div>
        </div>


    </div>
@endsection
