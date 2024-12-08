@extends('layouts.app')

@section('title', 'Homepage')

@push('styles')
    <!-- Custom styles for the page -->
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    
@endpush

@section('content')
<div class="homepage-container">
    <!-- Slideshow on the left -->
    <div class="slideshow-container">
        <div id="slideshow">
            <!-- Dynamic images will be injected here -->
        </div>
    </div>

    <!-- Scrollable flip box on the right -->
    <div class="flip-box">
        <div class="flip-box-inner">
            <div class="flip-box-front" id="flip-box-front">
                <!-- Front text will be injected here -->
            </div>
            <div class="flip-box-back" id="flip-box-back">
                <!-- Back text will be injected here -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Fetch images and text for the slideshow and flip box using an API
    async function loadContent() {
        const slideshowContainer = document.getElementById('slideshow');
        const flipBoxFront = document.getElementById('flip-box-front');
        const flipBoxBack = document.getElementById('flip-box-back');

        try {
            const recipeId = 12345; // Replace with dynamic recipe ID if needed
            const response = await fetch(`https://api.spoonacular.com/recipes/${recipeId}/information?apiKey=YOUR_API_KEY`);
            const data = await response.json();

            // Populate slideshow with images
            if (data.image) {
                const img = document.createElement('img');
                img.src = data.image; // Replace with the correct key for the image
                img.alt = data.title || 'Recipe Image';
                slideshowContainer.appendChild(img);
            }

            // Populate flip box with text
            if (data.summary) {
                flipBoxFront.innerHTML = `<p>${data.summary}</p>`;
            }
            if (data.instructions) {
                flipBoxBack.innerHTML = `<p>${data.instructions}</p>`;
            }
        } catch (error) {
            console.error('Error loading content:', error);
        }
    }

    // Call the function to load content
    loadContent();
</script>
@endpush
