@extends('layouts.auth')

@section('title', 'Verify Email')
@section('auth_title', 'Verify Your Email Address')
@section('auth_description', 'Before proceeding, please check your email for a verification link')

@section('content')
@if (session('status') == 'verification-link-sent')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> A new verification link has been sent to your email address.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<p class="mb-4">If you didn't receive the email, we can send you another one.</p>

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit" class="btn btn-primary w-100 mb-3">Resend Verification Email</button>
</form>

<form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
    @csrf
    <button type="submit" class="btn btn-outline-secondary w-100">Log Out</button>
</form>
@endsection
