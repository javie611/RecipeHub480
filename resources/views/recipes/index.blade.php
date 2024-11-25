@extends('layouts.app')

@section('title', 'Recipe Search')

@section('content')
<div class="container">
    <h1>Search for Recipes</h1>

    <form action="{{ route('recipes.search') }}" method="POST" class="mb-4">
        @csrf
        <input type="text" name="query" placeholder="Search for a recipe..." class="form-control" value="{{ $query ?? '' }}" required>
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(isset($recipes))
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe['title'] }}</h5>
                            <a href="{{ route('recipes.show', $recipe['id']) }}" class="btn btn-primary">View Ingredients</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
