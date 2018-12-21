@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col justify-content-center">
                <form action="/profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <div class="profile-image"><img id="profile-avatar" src="{{ asset('img/avatars/' . $user->avatar) }}" alt="" width="150px" height="150px" class="rounded-circle justify-content-center"></div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div id="avatar-input-block" class="custom-file">
                        <label class="custom-file-label" for="avatar">Choose avatar image...</label>
                        <input class="custom-file-input" type="file" name="avatar" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name='username' class="form-control" value="{{ $user->username }}" minlength="3" max-length='25' required>
                            <small id="usernameHelpBlock" class="form-text text-muted">
                                Your username must be 3-25 characters long 
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" minlength="6" max-length='20'>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Your password must be 6-20 characters long 
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col"></div>
            <div class="col">
                @include('layouts.errors')
            </div>
            <div class="col"></div>
        </div>
    </div><br />
@endsection