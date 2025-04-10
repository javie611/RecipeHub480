<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
class RecipeController extends Controller
{


    public function index()
    {
        return view('recipes.index');
    }

    public function fetchRecipe($id)
    {
        $apiKey = config('services.spoonacular.api_key');
        $url = "https://api.spoonacular.com/recipes/{$id}/information";

        try {
            $response = Http::get($url, [
                'apiKey' => $apiKey
            ]);

            if ($response->successful()) {
                // Pass the recipe data to the fetch view
                return view('recipes.fetch', ['recipe' => $response->json()]);
            } else {
                return redirect()->route('recipes.index')->with('error', 'Unable to fetch recipe');
            }
        } catch (\Exception $e) {
            return redirect()->route('recipes.index')->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function search(Request $request)
{
    $apiKey = config('services.spoonacular.api_key');
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
        Log::info("API Request Made", [
                'endpoint' => "https://api.spoonacular.com/recipes/complexSearch",
                'parameters' => ['query' => $query, 'number' => 20],
                'status' => $response->status(),
                'response' => $response->json(),
            ]);

        $recipes = $response->json()['results'] ?? [];
        return view('recipes.index', compact('recipes', 'query'));

    } catch (\Exception $e) {
        return redirect()->route('recipes.index')->with('error', 'Unable to fetch recipes.');
    }
}
public function show($id)
{
    $apiKey = config('services.spoonacular.api_key');

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
    $recipes = Cache::remember('daily_recipes', 86400, function () {
        $apiKey = config('services.spoonacular.api_key');
        $response = Http::get("https://api.spoonacular.com/recipes/random", [
            'apiKey' => $apiKey,
            'number' => 3,
        ]);

        if ($response->successful()) {
            return $response->json()['recipes'];
        }

        return [];
    });

    return view('dashboard', compact('recipes'));
}
}
