@extends('layouts.form')

@section('form')

    <div class="form-group">
        <label for="">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $announcement->title }}">
        @if($errors->has('title'))
            <div class="alert alert-warning" role="alert">{{ $errors->first('title') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="">Content:</label>
        <textarea type="text" class="form-control" id="content" name="content" rows="8" value="{{ old('content') ?? $announcement->content }}">{{ old('content') ?? $announcement->content }}</textarea>

        @if($errors->has('content'))
            <div class="alert alert-warning" role="alert">{{ $errors->first('content') }}</div>
        @endif
    </div>

    <div class="form-group d-flex flex-column">
        <label for="">Announcement image:</label>
        <input type="file" id="image" name="image">

        @if($errors->has('image'))
            <label class="alert alert-warning" role="alert">{{ $errors->first('image') }}</label>
        @endif
    </div>

    <input type="text" id="user_id"  name="user_id" value="{{$announcement->user->id}}" hidden>

    <button class="btn btn-primary mt-4" type="submit">Submit</button>

@endsection
