@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">

        </div>
    </div>

    <div class="row">
        <div class="col">
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
    </div>
@endsection
