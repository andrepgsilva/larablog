@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 home-main">
            <div class="card">
                <div class="card-header">
                    <span>My Posts</span>
                    <a href="{{ url('/posts/create') }}" class="float-right btn btn-success">
                        Add Post<i class="fas fa-plus fa-sm text-dark"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Edit Post</th>
                                <th scope="col">Delete Post</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                @component('layouts.components.post-row-table')
                                    @slot('title')
                                        {{ $post->title }}
                                    @endslot
                                    @slot('article')
                                        {{ $post->article }}
                                    @endslot
                                    @slot('tags')
                                        {{ implode(', ', $post->getNameTags()) }}
                                    @endslot
                                    @slot('created_at')
                                        {{ $post->created_at }}
                                    @endslot
                                    @slot('updated_at')
                                        {{ $post->updated_at }}
                                    @endslot
                                @endcomponent
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
