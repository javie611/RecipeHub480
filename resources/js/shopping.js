@extends('layouts.app')

console.log('shopping.js loaded!');

@section('title', 'RecipeHub - List Maker')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/shopping.css') }}">
@endpush

@section('content')
<div id="list-maker">
    <img id="logo" src="{{ asset('images/logo.png') }}" alt="Website Logo">

    <h1>RecipeHub List Maker</h1>

    <section id="ingredients-section">
        <h2>Ingredients</h2>
        <ul id="ingredients-list"></ul>
    </section>

    <section id="shopping-list-section">
        <h2>Your Shopping List</h2>
        <ul id="shopping-list"></ul>
        <button id="show-list-button" type='button'>Save Shopping List</button>
    </section>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>


document.addEventListener('DOMContentLoaded', () => {
    const shoppingList = document.getElementById('shopping-list');
    const showListButton = document.getElementById('show-list-button');
    const modal = document.getElementById('modal');
    const modalList = document.getElementById('modal-list');
    const closeModal = document.getElementById('close-modal');
    const printModalButton = document.getElementById('print-modal');
    const ingredientCheckboxes = document.querySelectorAll('.ingredient-checkbox');


    // Function to update shopping list dynamically
    const updateShoppingList = () => {
        const selectedIngredients = Array.from(ingredientCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.dataset.ingredient);
        
        // Clear current list
        shoppingList.innerHTML = '';

        // Populate updated list
        selectedIngredients.forEach(ingredient => {
            const li = document.createElement('li');
            li.textContent = ingredient;
            shoppingList.appendChild(li);
        });
    };

    // Event listener for checkboxes
    ingredientCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateShoppingList);
    });
    

    if (!showListButton) {
        console.error('Button with id "show-list-button" not found!');
        return;
    }

    showListButton.addEventListener('click', async () => {
        console.log('Save Shopping List button clicked!');
        
        // Gather shopping list items
        const ingredients = Array.from(shoppingList.querySelectorAll('li')).map(li => li.textContent);
        console.log('Ingredients to save:', ingredients);

        // Send ingredients to the backend using Axios
        try {
            const response = await axios.post('/save-shopping-list', { ingredients });
            console.log('Server response:', response.data);
            alert('Shopping list saved successfully!');
        } catch (error) {
            console.error('Error saving shopping list:', error);
            alert('Failed to save shopping list. Please try again.');
        }
    });
    
    // Show the modal with the shopping list

});
</script>
@endpush
