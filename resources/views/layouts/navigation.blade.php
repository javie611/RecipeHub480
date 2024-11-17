<!-- Navigation Bar -->
<div class="top-bar">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="RecipeHub Logo">
    </div>

    <!-- Navigation Links -->
    <div class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('recipes') }}">Recipes</a>
        <a href="{{ route('favorites') }}">Favorites</a>
        <a href="{{ route('about') }}">About Us</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

    <div class="auth-links">
        <!-- If the user is authenticated, show these links -->
        @auth
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        @endauth

        <!-- If the user is a guest, show these links -->
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest
    </div>
</div>
