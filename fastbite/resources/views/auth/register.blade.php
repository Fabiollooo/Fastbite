@extends('layouts.auth')

@section('title', 'Register')
@section('auth_title', 'Create an account')
@section('auth_description', 'Enter your details below to create your account')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label for="firstName" class="form-label">First name</label>
        <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName" value="{{ old('firstName') }}" placeholder="First name" required autofocus>
        @error('firstName')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="surname" name="lastName" value="{{ old('lastName') }}" placeholder="Surname" required autofocus>
        @error('lastName')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" required>
        @error('email')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
        @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm password</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
        @error('password_confirmation')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">Create account</button>

    <div class="text-center text-muted small">
        Already have an account?
        <a href="{{ route('login') }}" class="text-decoration-none">Log in</a>
    </div>
</form>
@endsection
