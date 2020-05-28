@extends('layouts.form')

@section('form')

        <!-- competitor first name -->
        <div class="form-group">
            <label for="">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ old('firstName') ?? $competitor->firstName }}">
            @if($errors->has('firstName'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('firstName') }}</div>
            @endif
        </div>

        <!-- competitor last name -->
        <div class="form-group">
            <label for="">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') ?? $competitor->lastName }}">
            @if($errors->has('lastName'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('lastName') }}</div>
            @endif
        </div>

        <!-- competitor age -->
        <div class="form-group">
            <label for="">Age:</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age') ?? $competitor->age }}">
            @if($errors->has('age'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('age') }}</div>
            @endif
        </div>

        <!-- competitor last name -->
        <div class="form-group">
            <label for="">Club:</label>
            <input type="text" class="form-control" id="club" name="club" value="{{ old('club') ?? $competitor->club }}">
            @if($errors->has('club'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('club') }}</div>
            @endif
        </div>

        <input type="number" id="regatta_id" name="regatta_id" value="{{ $_GET['regatta_id'] }}" hidden>

        <button class="btn btn-primary mt-4" type="submit">Submit</button>

@endsection
