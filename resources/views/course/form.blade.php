@extends('layouts.form')

@section('form')

        <!-- course name -->
        <div class="form-group">
            <label for="">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $course->name }}">
            @if($errors->has('name'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- course description -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="8" value="{{ old('description') ?? $course->description }}">{{ old('description') ?? $course->description }}</textarea>

            @if($errors->has('description'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <!-- [course coach] -->
        <div class="form-group">
            <label for="">Coach:</label>

            <select class="form-control" name="coach_id" value="{{ old('coach') }}">
                <option value="{{ $course->coach ?? '' }}" selected>{{ "Select a coach" }}</option>
                @foreach (App\Coach::GetAvailable() as $coach)
                    <option value="{{ $coach->id }}" >{{ $coach->firstName . " " . $coach->lastName }}</option>
                @endforeach
            </select>
        </div>

        <!-- [image] -->
        <div class="form-group d-flex flex-column">
            <label for="">Course image:</label>
            <input type="file" id="image" name="image">

            @if($errors->has('image'))
                <label class="alert alert-warning" role="alert">{{ $errors->first('image') }}</label>
            @endif
        </div>

        <button class="btn btn-primary mt-4" type="submit">Submit</button>

        @csrf
@endsection

