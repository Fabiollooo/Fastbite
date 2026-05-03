@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Dashboard</h1>
<h4 class="mb-4">Welcome, {{ auth()->user()->firstName }} {{ auth()->user()->lastName }} ! {{ auth()->user()->userType }}</h4>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">Some quick example text to build on the card title.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">Some quick example text to build on the card title.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">Some quick example text to build on the card title.</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Main Content</h5>
    </div>
    <div class="card-body">
        <p>Welcome to the Fastbite dashboard! This is your main content area.</p>
    </div>
</div>
@endsection
