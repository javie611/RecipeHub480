@extends('layouts.app') <!-- Assuming you have a base layout -->

@section('title', 'Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
   

    <!-- Main Content -->
    <div class="main-content">
        <!-- Left Section (Search Bar) -->
        <div class="left-section">
            <div class="search-bar">
                <input type="text" placeholder="Search for recipes..." />
            </div>
        </div>
        <!-- Right Section (Top Recipe) -->
        <div class="right-section">
            <h2>Top Recipe of the Week</h2>
            <img src="{{ asset('images/lasagna.jpg') }}" alt="Top Recipe" class="top-recipe-image" />
            <p>Delicious Homemade Lasagna</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">RecipeHub 2024</div>
@endsection
