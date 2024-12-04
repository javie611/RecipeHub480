<!-- resources/views/recipes/fetch.blade.php -->
@extends('layouts.app')

@section('title', 'Recipe Details')

@section('content')
<div class="container">
    <h1>{{ $recipe['title'] }}</h1>
    
    <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" class="img-fluid">

    <h3>Ingredients</h3>
    <ul>
        @foreach($recipe['extendedIngredients'] as $ingredient)
            <li>{{ $ingredient['original'] }}</li>
        @endforeach
    </ul>

    <h3>Instructions</h3>
    <p>{{ $recipe['instructions'] }}</p>

    <a href="{{ route('recipes.index') }}" class="btn btn-primary">Back to Search</a>
</div>
@endsection
