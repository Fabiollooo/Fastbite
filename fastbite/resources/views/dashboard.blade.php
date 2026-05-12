<?php
function convertUserType($userType) {
    switch ($userType) {
        case 1:
            return 'Customer';
        case 2:
            return 'Cashier';
        case 3:
            return 'Cook';
        case 4:
            return 'Manager';
        default:
            return 'Unknown';
    }
}
?>

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Dashboard</h1>
<h4 class="mb-4">Welcome, {{ auth()->user()->firstName }} {{ auth()->user()->lastName }} ({{ convertUserType(auth()->user()->userType) }}) !</h4>

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
        <!-- <p>Welcome to the Fastbite dashboard! This is your main content area.</p> -->
        <div class="row"> 
        @foreach ($menuItems as $item)
            <div class="col-md-4 mb-4">
               <div class="card h-100">
                    <div class="card-body">     
                        <h6>{{ $item->itemName }}</h6>
                        <p>{{ $item->itemDescription }}</p>
                        <p><strong>Price:</strong> ${{ number_format($item->itemPrice, 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
