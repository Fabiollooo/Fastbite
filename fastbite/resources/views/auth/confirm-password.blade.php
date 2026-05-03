@extends('layouts.auth')

@section('title', 'Confirm Password')
@section('auth_title', 'Confirm Your Password')
@section('auth_description', 'For your security, please confirm your password to continue')

@section('content')
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autofocus>
        @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100">Confirm Password</button>
</form>
@endsection
