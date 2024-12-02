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
            @foreach (session('shopping_list', []) as $index => $item)
                <li>{{ $item }}
                <!-- Add Delete Button -->
                <form action="{{ route('shopping.delete', $index) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>


                </li>
            @endforeach
        </ul>
    </section>
</div>
@endsection

@push('scripts')
<script>
    async function saveShoppingList() {
        // Gather the ingredients from the shopping list
        const shoppingListItems = document.querySelectorAll('#shopping-list li');
        const ingredients = Array.from(shoppingListItems).map(item => item.textContent.trim());
    
        // Check if there are ingredients to save
        if (ingredients.length === 0) {
            alert('Your shopping list is empty!');
            return;
        }
    
        try {
            // Send the ingredients to the backend via fetch API
            const response = await fetch('/save-shopping-list', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token for security
                },
                body: JSON.stringify({ ingredients })
            });
    
            if (response.ok) {
                const data = await response.json();
                console.log('Success:', data);
                alert('Shopping list saved successfully!');
            } else {
                console.error('Failed to save shopping list:', response);
                alert('Failed to save shopping list. Please try again.');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while saving the shopping list. Please try again.');
        }
    }
    </script>
    
    <button onclick="saveShoppingList()">Save Shopping List</button>
@endpush
