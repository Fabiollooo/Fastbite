@extends('layouts.auth')

@section('title', 'Login')
@section('auth_title', 'Log in to your account')
@section('auth_description', 'Enter your email and password below to log in')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" required autofocus>
        @error('email')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <label for="password" class="form-label mb-0">Password</label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none small">Forgot password?</a>
            @endif
        </div>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
        @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            Remember me
        </label>
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">Log in</button>

    <div class="text-center text-muted small">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-decoration-none">Sign up</a>
    </div>
</form>
@endsection
