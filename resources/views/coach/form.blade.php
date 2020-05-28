@extends('layouts.form')

@section('form')

        <!-- coach first name -->
        <div class="form-group">
            <label for="">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ old('firstName') ?? $coach->firstName }}">
            @if($errors->has('firstName'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('firstName') }}</div>
            @endif
        </div>

        <!-- coach last name -->
        <div class="form-group">
            <label for="">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') ?? $coach->lastName }}">
            @if($errors->has('lastName'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('lastName') }}</div>
            @endif
        </div>

        <!-- coach description -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="8" value="{{ old('description') ?? $coach->description }}">{{ old('description') ?? $coach->description }}</textarea>

            @if($errors->has('description'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <!-- [coach course] -->
        <div class="form-group">
            <label for="">Course:</label>

            <select class="form-control" name="course_id" value="{{ old('course_id') }}">
                <option value="{{ $coach->course->id ?? ''}}" selected>{{ $coach->course->name ?? "Select a course" }}</option>
                @foreach (App\Course::GetAvailable() as $course)
                    <option value="{{ $course->id }}" >{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- [image] -->
        <div class="form-group d-flex flex-column">
            <label for="">Coach image:</label>
            <input type="file" id="image" name="image">

            @if($errors->has('image'))
                <label class="alert alert-warning" role="alert">{{ $errors->first('image') }}</label>
            @endif
        </div>

        <button class="btn btn-primary mt-4" type="submit">Submit</button>

@endsection

