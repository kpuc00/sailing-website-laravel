@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <ul class="list-group-flush">
                @foreach($announcements as $announcement)
                    <li class="list-group-item" data-role="announcement">
                        <a href="/announcement/{{ $announcement->id }}" class="btn text-dark list-group-item-action">
                            <div class="media">
                                <img src="{{ asset('storage/announcement-img/'.$announcement->image) }}" class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $announcement->title }}</h5>
                                    <p>{{ $announcement->content }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>

@endsection
