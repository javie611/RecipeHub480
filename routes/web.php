<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ShoppingListController;

Route::get('/fetch-recipe/{id}', [RecipeController::class, 'fetchRecipe'])->name('fetch-recipe');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/posts', function () {
    return view('posts'); 
})->name('posts');

Route::get('/recipes.index', function () {
    return view('recipes.index'); 
})->name('recipes');

Route::get('/shopping.index', function () {
    return view('shopping.index'); 
})->name('shopping');
});

Route::get('/js/shopping.js', function () {
    return response()->file(resource_path('js/shopping.js'));
});

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::post('/recipes/search', [RecipeController::class, 'search'])->name('recipes.search');
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/recipes/{id}/fetch', [RecipeController::class, 'fetchRecipe'])->name('recipes.fetch');

Route::post('/shopping', [ShoppingController::class, 'store'])->name('shopping.store');
Route::get('/shopping', [ShoppingController::class, 'index'])->name('shopping.index');
Route::post('/shopping/store', [ShoppingController::class, 'store'])->name('shopping.store');



Route::post('/save-shopping-list', [ShoppingListController::class, 'store'])->name('save.shopping.list');
Route::get('/recipes/{id}/fetch', [RecipeController::class, 'fetchRecipe'])->name('recipes.fetch');


Route::post('/shopping/add', [ShoppingController::class, 'addUncheckedIngredients'])->name('shopping.add');
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/recipes/{id}/ingredients', [RecipeController::class, 'ingredients'])->name('recipes.ingredients');

Route::post('/shopping/recipe', function (Request $request) {
    $recipeId = $request->input('recipe_id');
    $apiKey = 'your-api-key';  // Replace with your API key

    $response = Http::get("https://api.spoonacular.com/recipes/{$recipeId}/information", [
        'apiKey' => $apiKey,
    ]);

    if ($response->successful()) {
        $ingredients = $response->json()['extendedIngredients'];
        session(['ingredients' => $ingredients]); // Store ingredients in session
    }

    return redirect()->route('shopping.index');
})->name('shopping.recipe');

Route::post('/shopping/save', function (Request $request) {
    $user = auth()->user(); // Assuming user is authenticated
    $shoppingList = $request->input('shopping_list'); // Get the list of ingredients

    // Save the shopping list
    $shoppingListModel = new ShoppingList();
    $shoppingListModel->user_id = $user->id; // Set the user ID
    $shoppingListModel->ingredients = $shoppingList; // Store the ingredients (which could be an array)
    $shoppingListModel->save();

    return redirect()->route('shopping.index'); // Redirect back to shopping list page
});

Route::post('/shopping/save', [ShoppingController::class, 'saveShoppingList'])->name('shopping.save');
Route::get('/shopping', [ShoppingController::class, 'index'])->name('shopping.index');


Route::get('/dashboard', [RecipeController::class, 'dashboard'])->name('dashboard');



Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login'); // Removed guest middleware

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register'); // Removed guest middleware

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::delete('/shopping/delete/{index}', [ShoppingController::class, 'delete'])->name('shopping.delete');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
    
require __DIR__.'/auth.php';
