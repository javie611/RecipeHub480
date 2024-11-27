@extends('layouts.app')

@section('title', 'RecipeHub List Maker')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
@endpush

@section('content')
<div id="list-maker">
    <!-- Logo Placeholder -->
    <img id="logo" src="{{ asset('images/updatelogo.png') }}" alt="Website Logo" />

    <!-- Updated Title -->
    <h1>RecipeHub List Maker</h1>

    <section id="ingredients-section">
        <h2>Ingredients</h2>
        <h1>RecipeHub List Maker</h1>

<!-- Success Message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<section id="ingredients-section">
    <h2>Ingredients</h2>

    
    </form>
</section>



        <!-- Optionally, add an ingredient form -->
        <form action="{{ route('shopping.store') }}" method="POST">
            @csrf
            <input type="text" name="ingredient" placeholder="Add your own ingredient" required />
            <button type="submit">Add Ingredient</button>
        </form>
    </section>

    <section id="shopping-list-section">
        <h2>Your Shopping List</h2>
        <ul id="shopping-list">
            <!-- Dynamically updated shopping list -->
            @foreach (session('shopping_list', []) as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
        <button id="show-list-button">Show Shopping List</button>
    </section>

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
