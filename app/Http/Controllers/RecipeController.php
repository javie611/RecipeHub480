<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipes.index');
    }

    public function fetchRecipe($id)
    {
        $apiKey = env('SPOONACULAR_API_KEY');
        $url = "https://api.spoonacular.com/recipes/{$id}/information";

        try {
            $response = Http::get($url, [
                'apiKey' => $apiKey
            ]);

            if ($response->successful()) {
                return response()->json($response->json(), 200);
            } else {
                return response()->json(['error' => 'Unable to fetch recipe'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function search(Request $request)
{
    $apiKey = env('SPOONACULAR_API_KEY');
    $query = $request->input('query');

    if (!$query) {
        return redirect()->route('recipes.index')->with('error', 'Please enter a search term.');
    }

    try {
        $response = Http::get("https://api.spoonacular.com/recipes/complexSearch", [
            'query' => $query,
            'apiKey' => $apiKey,
            'number' => 20 // Limit the number of results
        ]);

        $recipes = $response->json()['results'] ?? [];
        return view('recipes.index', compact('recipes', 'query'));

    } catch (\Exception $e) {
        return redirect()->route('recipes.index')->with('error', 'Unable to fetch recipes.');
    }
}
public function show($id)
{
    $apiKey = env('SPOONACULAR_API_KEY');

    try {
        $response = Http::get("https://api.spoonacular.com/recipes/{$id}/information", [
            'apiKey' => $apiKey
        ]);

        $recipe = $response->json();
        $ingredients = $recipe['extendedIngredients'] ?? [];

        return view('recipes.show', compact('recipe', 'ingredients'));

    } catch (\Exception $e) {
        return redirect()->route('recipes.index')->with('error', 'Unable to fetch recipe details.');
    }
}
public function dashboard()
{
    $apiKey = config('services.spoonacular.api_key'); // Fetch API key from config/services.php
    $response = Http::get("https://api.spoonacular.com/recipes/random", [
        'apiKey' => $apiKey,
        'number' => 3, // Fetch 3 random recipes
    ]);

    if ($response->successful()) {
        $recipes = $response->json()['recipes'];
        return view('dashboard', compact('recipes')); // Updated view name
    }

    return view('dashboard', ['recipes' => []]); // Pass empty array if request fails
}

}
