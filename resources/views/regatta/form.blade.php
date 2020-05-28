@extends('layouts.form')

@section('form')

        <!-- regatta name -->
        <div class="form-group">
            <label for="">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $regatta->name }}">
            @if($errors->has('name'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <button class="btn btn-primary mt-4" type="submit">Submit</button>

        @csrf
@endsection

