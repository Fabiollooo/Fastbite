@extends('layouts.auth')

@section('title', 'Forgot Password')
@section('auth_title', 'Forgot Your Password?')
@section('auth_description', 'No problem. Just let us know your email address and we will email you a password reset link')

@section('content')
<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" required autofocus>
        @error('email')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">Email Password Reset Link</button>

    <div class="text-center text-muted small">
        Remember your password?
        <a href="{{ route('login') }}" class="text-decoration-none">Back to login</a>
    </div>
</form>
@endsection
