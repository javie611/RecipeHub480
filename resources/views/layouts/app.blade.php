<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RecipeHub')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> 
    @stack('styles') <!-- Placeholder for additional CSS -->
</head>
</head>
<body>
    <!-- Top Navigation Bar -->
    <div class="top-bar">
        <div class="logo">
        <img
                src="{{ asset('images/updatelogo.png') }}"
                alt="RecipeHub Logo"
                width="110"
                height="110"
            />
        </div>
        <div class="nav-links">
    <a href="{{ route('dashboard') }}">Home</a>
    <a href="{{ route('recipes') }}">Recipes</a>
    <a href="{{ route('shopping') }}">Shopping Lists</a>
    <a href="{{ route('about') }}">About</a>
   
    <!-- Display login/logout based on authentication -->
    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endguest

    @auth
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</div>
        <div class="buttons">
            <!-- icons with custom images -->
            <a href="{{ route('recipes') }}" class="nav-button" title="Search">
                <img
                    src="{{ asset('images/icons8-search-128.png') }}"
                    alt="Search"
                    width="40"
                    height="40"
                />
            </a>
            <a href="{{ route('profile') }}" class="nav-button" title="Account">
                <img
                    src="{{ asset('images/icons8-chef-hat-50.png') }}"
                    alt="Account"
                    width="40"
                    height="40"
                />
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>
    <!-- Auth Section -->
    <div class="auth-section">
        @yield('auth-section')
    </div>
    
</body>
@stack('scripts')
</html>

