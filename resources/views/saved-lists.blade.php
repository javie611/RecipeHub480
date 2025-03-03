@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/saved-lists.css') }}">
@endpush

@section('content')
<div class="container">
    <h1>Your Saved Shopping Lists</h1>
    <div class="list-grid">
        @forelse($shoppingLists as $list)
        <div class="list-card">
            <h2>{{ $list->name }}</h2>
            <ul>
                @if(is_array($list->ingredients))
                    @foreach($list->ingredients as $ingredient)
                        <li>{{ $ingredient }}</li>
                    @endforeach
                @else
                    <li>Invalid data</li>
                @endif
            </ul>
            <div class="button-group">
                <form action="{{ route('shopping-lists.destroy', $list->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this shopping list?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button delete">Delete</button>
                </form>
            </div>
        </div>
        @empty
        <p>No saved shopping lists found.</p>
        @endforelse
    </div>
    <a href="{{ route('shopping.index') }}"> <button class="add-list-button">+ Add New List</button> </a>
</div>
@endsection
