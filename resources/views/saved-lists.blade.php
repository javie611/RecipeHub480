@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Saved Shopping Lists</h1>
    <ul>
    @forelse($shoppingLists as $list)
        <li>
            <strong>{{ $list->name }}</strong>: 
            Ingredients: {{ is_array($list->ingredients) ? implode(', ', $list->ingredients) : 'Invalid data' }}
            <form action="{{ route('shopping-lists.destroy', $list->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this shopping list?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </li>
    @empty
        <p>No saved shopping lists found.</p>
    @endforelse
    </ul>
</div>
@endsection
