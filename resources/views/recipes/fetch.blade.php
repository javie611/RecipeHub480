@extends('layouts.app')

@section('title', 'Recipe Details')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/recipe-details.css') }}">
@endpush

@section('content')
<div class="container">
    <!-- Top Section (Image and Ingredients) -->
    <div class="top-section">
        <!-- Image Section -->
        <div class="image-section">
            <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}">
        </div>

        <!-- Ingredients Section -->
        <div class="ingredients-section">
            <h3>Ingredients</h3>
            <ul class="ingredients-list">
                @foreach($recipe['extendedIngredients'] as $ingredient)
                    <li>{{ $ingredient['original'] }}</li>
                @endforeach
            </ul>
            <a href="{{ route('recipes.show', $recipe['id']) }}" class="btn btn-primary">View Ingredients</a>
        </div>
    </div>

    <!-- Instructions Section -->
    <div class="instructions-section">
        <h3>Instructions</h3>
        <p>
            {!! nl2br(e($recipe['instructions'])) !!}
</p>
    </div>

    <!-- Back Button -->
    <a href="{{ route('recipes.index') }}" class="btn">Back to Search</a>
</div>
@endsection
