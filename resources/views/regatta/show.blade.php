@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col text-center">
            <p class="h1 text-mutted">{{ $regatta->name }}</p>
        </div>
    </div>

    @if (Auth::user())
        @if (Auth::user()->isAdmin())
            <div class="row my-4">
                <div class="col-lg-6 col-md-6 col-sm-6" >
                    <a href="/regatta/{{ $regatta->id }}/edit" class="btn btn-primary">Edit a regatta</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form action="/regatta/{{ $regatta->id }}" method="POST">
                        @method('DELETE')
                        <button class="btn btn-danger float-right" type="submit" method="POST">Delete</button>
                        @csrf
                    </form>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <a href="/competitor/create?regatta_id={{ $regatta->id }}" class="btn btn-primary my-4">Take part</a>
            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Club</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($competitors as $competitor)
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $competitor->firstName }}</td>
                            <td>{{ $competitor->lastName }}</td>
                            <td>{{ $competitor->age }}</td>
                            <td>{{ $competitor->club }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center py-4">
                {{ $competitors->links() }}
            </div>
        </div>
    </div>
@endsection

