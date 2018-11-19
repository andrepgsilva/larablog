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
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in! --}}
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
                            <tr>
                                <td>Blabla</td>
                                <td>OH MY GOD NEW PS4</td>
                                <td>This,That,nonono</td>
                                <td>{{ date("Y-m-d H:i:s") }}</td>
                                <td>{{ date("Y-m-d H:i:s") }}</td>
                                <td class="text-center">
                                    <a href="" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="" class="text-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Dragon Ball</td>
                                <td>DRAGON BALL IS AWESOME</td>
                                <td>dbz, anime</td>
                                <td>{{ date("Y-m-d H:i:s") }}</td>
                                <td>{{ date("Y-m-d H:i:s") }}</td>
                                <td class="text-center">
                                <a href="" class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="" class="text-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
