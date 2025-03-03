@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1>Welcome to RecipeHub!</h1>
            <p>Discover, save, and share amazing recipes.</p>
            <a href="{{ route('register') }}" class="cta-button">Get Started</a>
        </div>
    </div>

    <!-- Features Section -->
    <section class="features">
        <h2>Why RecipeHub?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <img src="{{ asset('images/searchforrecipes.JPG') }}" alt="Search Recipes">
                <h3>Search Recipes</h3>
                <p>Find recipes tailored to your tastes.</p>
            </div>
            <div class="feature-card">
                <img src="{{ asset('images/instuction-recipe.JPG') }}" alt="Save Favorites">
                <h3>Instructions on your favorite recipes </h3>
                <p>Ingrtidients and how-tos all in one place.</p>
            </div>
            <div class="feature-card">
                <img src="{{ asset('images/create&saveshoppinglists.JPG') }}" alt="Shopping Lists">
                <h3>Create Shopping Lists</h3>
                <p>Create and save shopping lists for all your favorite recipes.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
<section class="testimonials">
    <h2>What Our Users Say</h2>
    <div class="testimonial-grid">
        <!-- User Story 1 -->
        <div class="testimonial-card">
            <img src="{{ asset('images/sushiathome.jpg') }}" alt="Sushi at Home">
            <p>"Sushi at home? Can't say no to that!"</p>
            <span>- Itzel C.</span>
        </div>
        <!-- User Story 2 -->
        <div class="testimonial-card">
            <img src="{{ asset('images/pizza-homw-page.jpg') }}" alt="Homemade Pizza">
            <p>"Helped me create my fave Pizza!"</p>
            <span>- Jakob T.</span>
        </div>
        <!-- User Story 3 -->
        <div class="testimonial-card">
            <img src="{{ asset('images/Mexican-Street-Tacos-Recipe-Card.jpg') }}" alt="Mexican Street Tacos">
            <p>"I was able to make tacos for the first time at my new place. Also, the shopping list feature is a lifesaver."</p>
            <span>- Des S.</span>
        </div>
        <!-- Add More Stories Dynamically -->
    </div>
</section>


    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} RecipeHub. All rights reserved.</p>
    </footer>
@endsection
