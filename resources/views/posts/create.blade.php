@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center col-md-12">
            <form action="{{ url('/posts') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" minlength="3" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="article">Article</label>
                    <textarea name="article" class="form-control" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tag">Tags</label>
                    <input type="text" name="tag" class="form-control" minlength="2" maxlength="255" required>
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