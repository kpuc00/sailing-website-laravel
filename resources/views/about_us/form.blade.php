@extends('layouts.form')

@section('form')

        <!-- title -->
        <div class="form-group">
            <label for="">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $about->title }}">
            @if($errors->has('title'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <!-- content -->
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea type="text" class="form-control" id="content" name="content" rows="8" value="{{ old('content') ?? $about->content }}">{{ old('content') ?? $about->content }}</textarea>

            @if($errors->has('content'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('content') }}</div>
            @endif
        </div>

        <!-- [image] -->
        <div class="form-group d-flex flex-column">
            <label for="">Image:</label>
            <input type="file" id="image" name="image">

            @if($errors->has('image'))
                <label class="alert alert-warning" role="alert">{{ $errors->first('image') }}</label>
            @endif
        </div>

        <button class="btn btn-primary mt-4" type="submit">Submit</button>

@endsection

