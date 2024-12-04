<!-- resources/views/recipes/recipe_of_the_week.blade.php -->

@extends('layouts.app')

@section('title', 'Recipe of the Week')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/') }}" defer></script>
@endpush
@section('content')
<h2>Recipe of the Week</h2>
<div class="slideshow-ingredients-container">
    <!-- Slideshow Section -->
    <div class="slideshow-container">
        @foreach($recipes as $index => $recipe)
            <div class="slide fade" data-index="{{ $index }}">
                <img src="{{ $recipe['image'] ?? asset('images/default.jpg') }}" alt="{{ $recipe['title'] }}" style="width:40%">
                <h3>{{ $recipe['title'] }}</h3>
            </div>
        @endforeach
        <!-- Navigation controls -->
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>

    <!-- Ingredients Section -->
    <div class="ingredients">
        <h3>Ingredients</h3>
        <ul id="ingredients-list">
            <!-- Dynamically updated -->
        </ul>
    </div>

    <!-- Instructions Section -->
    <div class="instructions">
        <h3>Instructions</h3>
        <ol id="instructions-list">
            <!-- Dynamically updated -->
        </ol>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const recipes = @json($recipes);
        let currentIndex = 0;

        // Function to update ingredients and instructions
        function updateDetails(index) {
            const recipe = recipes[index];
            const ingredientsList = document.getElementById('ingredients-list');
            const instructionsList = document.getElementById('instructions-list');

            // Update Ingredients
            ingredientsList.innerHTML = '';
            recipe.extendedIngredients.forEach(ingredient => {
                const li = document.createElement('li');
                li.textContent = ingredient.original;
                ingredientsList.appendChild(li);
            });

            // Update Instructions
            instructionsList.innerHTML = '';
            recipe.analyzedInstructions[0]?.steps.forEach(step => {
                const li = document.createElement('li');
                li.textContent = step.step;
                instructionsList.appendChild(li);
            });
        }

        // Function to change slide
        function changeSlide(direction) {
            const slides = document.querySelectorAll('.slide');
            slides[currentIndex].style.display = 'none';

            currentIndex = (currentIndex + direction + slides.length) % slides.length;

            slides[currentIndex].style.display = 'block';
            updateDetails(currentIndex);
        }

        // Initialize
        document.querySelectorAll('.slide').forEach((slide, index) => {
            slide.style.display = index === 0 ? 'block' : 'none';
        });
        updateDetails(currentIndex);

        // Expose navigation functions
        window.changeSlide = changeSlide;
    });
</script>
@endpush