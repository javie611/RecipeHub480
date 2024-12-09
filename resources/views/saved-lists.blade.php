@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Saved Shopping Lists</h1>
    <ul>
    @forelse($shoppingLists as $list)
        <li>
            Ingredients: {{ is_array($list->ingredients) ? implode(', ', $list->ingredients) : 'Invalid data' }}
        </li>
    @empty
        <p>No saved shopping lists found.</p>
    @endforelse
</ul>

</div>
@endsection
