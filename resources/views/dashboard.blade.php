@extends('layouts.app')

@section('title', 'Homepage')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush

@section('content')
<div class="homepage-container">
    <h1>Recipes of the Week</h1>

    <div class="content-wrapper" style="display: flex;">
        <!-- Slideshow on the left -->
        <div class="slideshow-container" style="flex: 1; padding-right: 20px;">
            <div id="slideshow"></div>
        </div>

        <!-- Flip box on the right -->
        <div class="flip-box" style="flex: 1; perspective: 1000px; height: 300px;">
            <div class="flip-box-inner" style="position: relative; width: 100%; height: 100%; transition: transform 0.6s; transform-style: preserve-3d;">
                <div class="flip-box-front" id="flip-box-front" style="position: absolute; width: 100%; height: 100%; backface-visibility: hidden; overflow-y: auto; padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; border-radius: 8px; box-sizing: border-box;">
                </div>
                <div class="flip-box-back" id="flip-box-back" style="position: absolute; width: 100%; height: 100%; backface-visibility: hidden; overflow-y: auto; padding: 10px; border: 1px solid #ddd; background-color: #f4f4f4; transform: rotateY(180deg); border-radius: 8px; box-sizing: border-box;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
async function loadContent() {
    const slideshowContainer = document.getElementById('slideshow');
    const flipBoxFront = document.getElementById('flip-box-front');
    const flipBoxBack = document.getElementById('flip-box-back');

    const apiKey = '34a42aa77a9b4a40b6388043accbe0bb';
    const cacheKey = 'dailyRecipe';
    const cacheTimestampKey = 'dailyRecipeTimestamp';
    const oneDayInMillis = 24 * 60 * 60 * 1000; // 1 day in milliseconds
    const randomRecipeEndpoint = `https://api.spoonacular.com/recipes/random?apiKey=${apiKey}`; // Random recipe endpoint

    try {
        const cachedRecipe = localStorage.getItem(cacheKey);
        const cachedTimestamp = localStorage.getItem(cacheTimestampKey);

        const now = Date.now();

        if (cachedRecipe && cachedTimestamp && now - parseInt(cachedTimestamp) < oneDayInMillis) {
            console.log('Using cached recipe');
            populateRecipe(JSON.parse(cachedRecipe));
        } else {
            console.log('Fetching new random recipe');
            const response = await fetch(randomRecipeEndpoint);
            const data = await response.json();
            const recipe = data.recipes[0]; // Random endpoint returns an array of recipes

            localStorage.setItem(cacheKey, JSON.stringify(recipe));
            localStorage.setItem(cacheTimestampKey, now.toString());

            populateRecipe(recipe);
        }
    } catch (error) {
        console.error('Error fetching recipe:', error);
        slideshowContainer.innerHTML = `<p>Error loading slideshow content. Please try again later.</p>`;
        flipBoxFront.innerHTML = `<p>Error loading recipe details.</p>`;
        flipBoxBack.innerHTML = `<p>Error loading recipe details.</p>`;
    }
}

function populateRecipe(data) {
    const slideshowContainer = document.getElementById('slideshow');
    const flipBoxFront = document.getElementById('flip-box-front');
    const flipBoxBack = document.getElementById('flip-box-back');

    // Populate slideshow with images
    if (data.image) {
        const img = document.createElement('img');
        img.src = data.image;
        img.alt = data.title || 'Recipe Image';
        img.style = 'max-width: 100%; height: auto;';
        slideshowContainer.appendChild(img);
    } else {
        slideshowContainer.innerHTML = `<p>No image available</p>`;
    }

    // Populate flip box front with title and ingredients
    if (data.extendedIngredients && data.extendedIngredients.length > 0) {
        const ingredientsList = data.extendedIngredients
            .map(ingredient => `<li>${ingredient.original}</li>`)
            .join('');
        flipBoxFront.innerHTML = `
            <h2 style="margin-bottom: 15px; font-size: 24px;">${data.title}</h2>
            <h3 style="margin-bottom: 10px; font-size: 20px;">Ingredients</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                ${ingredientsList}
            </ul>
        `;
    } else {
        flipBoxFront.innerHTML = `<p>No ingredients available.</p>`;
    }

    // Populate flip box back with instructions
    if (data.analyzedInstructions && Array.isArray(data.analyzedInstructions) && data.analyzedInstructions.length > 0) {
        const steps = data.analyzedInstructions[0].steps
            .map((step, index) => `<li> ${step.step}</li>`)
            .join('');
        flipBoxBack.innerHTML = `
            <h3 style="margin-bottom: 10px; font-size: 20px;">Instructions</h3>
            <ul style="list-style: decimal; padding: 0 20px; margin: 0;">
                ${steps}
            </ul>
        `;
    } else {
        console.log('No instructions available for this recipe.');
        flipBoxBack.innerHTML = `<p>No instructions available.</p>`;
    }
}

document.addEventListener('DOMContentLoaded', loadContent);
</script>
@endpush
