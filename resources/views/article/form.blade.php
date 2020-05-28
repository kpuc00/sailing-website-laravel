@extends('layouts.form')

@section('form')

        <!-- coach title -->
        <div class="form-group">
            <label for="">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $article->title }}">
            @if($errors->has('title'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <!-- coach description -->
        <div class="form-group">
            <label for="">Content:</label>
            <textarea type="text" class="form-control" id="content" name="content" rows="8" value="{{ old('content') ?? $article->content }}">{{ old('content') ?? $article->content }}</textarea>

            @if($errors->has('content'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('content') }}</div>
            @endif
        </div>

        <!-- [image] -->
        <div class="form-group d-flex flex-column">
            <label for="">Article image:</label>
            <input type="file" id="image" name="image">

            @if($errors->has('image'))
                <label class="alert alert-warning" role="alert">{{ $errors->first('image') }}</label>
            @endif
        </div>

        <input type="text" id="user_id"  name="user_id" value="1" hidden>

        <button class="btn btn-primary mt-4" type="submit">Submit</button>

@endsection

