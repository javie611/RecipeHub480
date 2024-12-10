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
        <div class="slideshow-container" style="flex: 1; padding-right: 20px; position: relative;">
            <div id="recipe-image" style="text-align: center;"></div>
            <div style="display: flex; justify-content: center; margin-top: 10px;">
                <button id="prev-btn" style="margin-right: 10px;">Previous</button>
                <button id="next-btn">Next</button>
            </div>
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
    const apiKey = '34a42aa77a9b4a40b6388043accbe0bb';
    const cacheKey = 'dailyRecipes';
    const cacheTimestampKey = 'dailyRecipesTimestamp';
    const oneDayInMillis = 24 * 60 * 60 * 1000; // 1 day in milliseconds
    const randomRecipeEndpoint = `https://api.spoonacular.com/recipes/random?apiKey=${apiKey}&number=3`; // Fetch 3 recipes

    const now = Date.now();
    let recipes = [];

    try {
        const cachedRecipes = localStorage.getItem(cacheKey);
        const cachedTimestamp = localStorage.getItem(cacheTimestampKey);

        if (cachedRecipes && cachedTimestamp && now - parseInt(cachedTimestamp) < oneDayInMillis) {
            console.log('Using cached recipes');
            recipes = JSON.parse(cachedRecipes);
        } else {
            console.log('Fetching new recipes');
            const response = await fetch(randomRecipeEndpoint);
            const data = await response.json();
            recipes = data.recipes;

            // Cache the recipes and timestamp
            localStorage.setItem(cacheKey, JSON.stringify(recipes));
            localStorage.setItem(cacheTimestampKey, now.toString());
        }

        setupSlideshow(recipes);
    } catch (error) {
        console.error('Error fetching recipes:', error);
        document.getElementById('recipe-image').innerHTML = `<p>Error loading recipes. Please try again later.</p>`;
    }
}

function setupSlideshow(recipes) {
    const recipeImageContainer = document.getElementById('recipe-image');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const flipBoxFront = document.getElementById('flip-box-front');
    const flipBoxBack = document.getElementById('flip-box-back');

    let currentIndex = 0;

    // Function to display a recipe
    function displayRecipe(index) {
        const recipe = recipes[index];

        // Update image
        recipeImageContainer.innerHTML = `<img src="${recipe.image}" alt="${recipe.title}" style="max-width: 100%; height: auto;">`;

        // Update flip box front with ingredients
        const ingredientsList = recipe.extendedIngredients
            .map(ingredient => `<li>${ingredient.original}</li>`)
            .join('');
        flipBoxFront.innerHTML = `
            <h2 style="margin-bottom: 15px; font-size: 24px;">${recipe.title}</h2>
            <h3 style="margin-bottom: 10px; font-size: 20px;">Ingredients</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                ${ingredientsList}
            </ul>
        `;

        // Update flip box back with instructions
        if (recipe.analyzedInstructions && recipe.analyzedInstructions.length > 0) {
            const steps = recipe.analyzedInstructions[0].steps
                .map((step, index) => `<li> ${step.step}</li>`)
                .join('');
            flipBoxBack.innerHTML = `
                <h3 style="margin-bottom: 10px; font-size: 20px;">Instructions</h3>
                <ul style="list-style: decimal; padding: 0 20px; margin: 0;">
                    ${steps}
                </ul>
            `;
        } else {
            flipBoxBack.innerHTML = `<p>No instructions available.</p>`;
        }
    }

    // Display the first recipe initially
    displayRecipe(currentIndex);

    // Add event listeners for buttons
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + recipes.length) % recipes.length;
        displayRecipe(currentIndex);
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % recipes.length;
        displayRecipe(currentIndex);
    });
}


document.addEventListener('DOMContentLoaded', loadContent);
</script>
@endpush
