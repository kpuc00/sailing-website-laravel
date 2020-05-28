@extends('layouts.form')

@section('form')
    <form action="/course" method="POST" enctype="multipart/form-data">
        <!-- course name -->
        <div class="form-group">
            <label for="">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{ old('name') ?? $course->name }}">
        </div>

        <!-- course description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="{{ old('description') ?? $course->description }}"></textarea>
        </div>

        <!-- [course coach] -->
        <div class="form-group">
            <label for="">Coach:</label>

            <select class="form-control" name="coach" value="{{ old('coach') }}">
                <option value="" selected>Select a coach</option>
                @foreach (App\Coach::GetAvailable() as $coach)
                    <option value="{{ $coach->id }}" >{{ $coach->firstName . " " . $coach->lastName }}</option>
                @endforeach
            </select>
        </div>

        <!-- [image] -->
        <div class="form-group d-flex flex-column">
            <label for="">Course image:</label>
            <input type="file" name="image">
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>

        @csrf
    </form>

@endsection

