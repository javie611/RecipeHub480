@extends('layouts.app')

@section('title', $recipe['title'])

@section('content')
<link rel="stylesheet" href="{{ asset('css/show-ingredients.css') }}">

<div class="container">
    <h1>{{ $recipe['title'] }}</h1>
    <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" class="img-fluid mb-4">

    <h2>Ingredients</h2>
    <form id="ingredients-form" action="{{ route('shopping.add') }}" method="POST">
        @csrf
        <ul id="ingredients-list">
            @foreach($ingredients as $ingredient)
                <li>
                    
<!-- Checkbox for each ingredient -->
<input type="checkbox" name="have[]" value="{{ $ingredient['original'] }}" id="ingredient-{{ $loop->index }}">
                    <label for="ingredient-{{ $loop->index }}">{{ $ingredient['original'] }}</label>
                </li>
            @endforeach
        </ul>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-2">Add Checked Ingredients to Shopping List</button>
    </form>
</div>
@endsection