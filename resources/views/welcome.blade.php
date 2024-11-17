@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <h1>Welcome to RecipeHub!</h1>
    <p>Your go-to platform for amazing recipes.</p>
@endsection

@section('auth-section')
    <!-- Register and Login Section -->
    <div class="auth-section">
        <!-- Register Form -->
        <div class="auth-area">
            <p>Would you like to create an account?</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf <!-- CSRF Token -->
                <button> <a href="{{ route('register') }}" class="button-link">Register</a></button>
            </form>
        </div>

        <!-- Login Form -->
        <div class="auth-area right">
            <div class="login-box">
                <p>Already have an account?</p>
                    @csrf <!-- CSRF Token -->
                    <button>
                    <a href="{{ route('login') }}" class="button-link">Login</a></button>
                </form>
            </div>
        </div>
        <!-- Logout Button (Only visible to authenticated users) -->
        @auth
        <div class="auth-area">
            <form action="{{ route('logout') }}" method="POST">
                @csrf <!-- CSRF Token -->
                <button type="submit">Logout</button>
            </form>
        </div>
        @endauth
    </div>
@endsection
