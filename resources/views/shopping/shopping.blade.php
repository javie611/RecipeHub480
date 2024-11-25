@extends('layouts.app')

@section('title', 'RecipeHub List Maker')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
@endpush

@section('content')
<div id="list-maker">
    <h1>RecipeHub List Maker</h1>

    <!-- Add ingredients form -->
    <section id="ingredients-section">
        <h2>Ingredients</h2>
        <form action="{{ route('shopping.add') }}" method="POST">
            @csrf
            <input type="text" name="ingredient" placeholder="Add your own ingredient" required />
            <button type="submit">Add Ingredient</button>
        </form>

        <ul id="ingredients-list">
            <!-- Loop through the ingredients passed from the controller -->
            @foreach (session('ingredients', []) as $ingredient)
                <li>
                    <input type="checkbox" class="ingredient-checkbox" data-ingredient="{{ $ingredient['original'] }}" />
                    {{ $ingredient['original'] }}
                </li>
            @endforeach
        </ul>
    </section>

    <!-- Recipe API Ingredient Fetch -->
    <section>
        <form action="{{ route('shopping.recipe') }}" method="POST">
            @csrf
            <input type="text" name="recipe_id" placeholder="Enter Recipe ID" required />
            <button type="submit">Get Ingredients</button>
        </form>
    </section>

    <!-- Shopping List Section -->
    <section id="shopping-list-section">
        <h2>Your Shopping List</h2>
        <ul id="shopping-list">
            <!-- Dynamically updated shopping list -->
        </ul>
        <button id="show-list-button">Show Shopping List</button>
    </section>

    <!-- Modal for Shopping List -->
    <div id="modal" style="display: none;">
        <h2>Shopping List</h2>
        <ul id="modal-list"></ul>
        <button id="print-modal">Print or Save</button>
        <button id="close-modal">Close</button>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/shopping.js') }}"></script>
@endpush
