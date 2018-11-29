@extends('layouts.app')

<!-- PUT VALIDATION JS RULES -->

@section('content')
    <div class="container">
        <div class="justify-content-center col-md-12">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="article">Article</label>
                    <textarea name="article" class="form-control" rows="5">{{$post->article}}</textarea>
                </div>
                <div class="form-group">
                    <label for="tag">Tags</label>
                    <input type="text" name="tag" class="form-control" value="{{implode(', ', $post->getNameTags())}}">
                    <small class="form-text text-muted">
                        Separate tags with commas
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
            @include('layouts.errors')
        </div>
    </div>
@endsection