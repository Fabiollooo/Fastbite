@extends('layouts.auth')

@section('title', 'Reset Password')
@section('auth_title', 'Reset Your Password')
@section('auth_description', 'Enter your new password below')

@section('content')
<form method="POST" action="{{ route('password.store') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email }}" placeholder="email@example.com" required autofocus>
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

    <button type="submit" class="btn btn-primary w-100">Reset Password</button>
</form>
@endsection
