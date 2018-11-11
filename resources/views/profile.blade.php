@extends('layouts.app');

@section('content')
    <div class="container">
        <form action="/profile/{{ $user->id }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name='username' class="form-control col-md-6" value="{{ $user->username }}" minlength="3" max-length='25' required>
                <small id="usernameHelpBlock" class="form-text text-muted">
                    Your username must be 3-25 characters long 
                </small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control col-md-6" value="{{ $user->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control col-md-6" minlength="6" max-length='20' required>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Your password must be 6-20 characters long 
                </small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br />
                @endforeach
            </div>
        @endif
    </div>
@endsection