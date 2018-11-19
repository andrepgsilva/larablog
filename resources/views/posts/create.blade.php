@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center col-md-12">
            <form action="">
                <div class="form-group">
                    <label for="titleField">Title</label>
                    <input type="text" class="form-control" name="titleField">
                </div>
                <div class="form-group">
                    <label for="articleField">Article</label>
                    <textarea name="articleField" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="tagField">Tags</label>
                    <input type="text" name="tagField" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection