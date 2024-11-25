@extends('layouts.app')

@section('title', $recipe['title'])

@section('content')
<div class="container">
    <h1>{{ $recipe['title'] }}</h1>
    <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" class="img-fluid mb-4">

    <h2>Ingredients</h2>
    <form id="ingredients-form" action="{{ route('shopping.add') }}" method="POST">
        @csrf
        <ul id="ingredients-list">
            @foreach($ingredients as $ingredient)
                <li>
                    <input type="checkbox" name="ingredients[]" value="{{ $ingredient['original'] }}">
                    {{ $ingredient['original'] }}
                </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary mt-2">Add to Shopping List</button>
    </form>
</div>
@endsection
