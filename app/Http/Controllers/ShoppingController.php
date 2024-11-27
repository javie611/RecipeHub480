<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;

class ShoppingController extends Controller
{
    public function index()
    {
        $shoppingLists = ShoppingList::where('user_id', auth()->id())->get(); 
        return view('shopping.index', compact('shoppingLists'));
    }

    public function store(Request $request)
    {
         // Validate the input
    $request->validate([
        'ingredient' => 'required|string|max:255', // Ensure ingredient is a valid string
    ]);

    // Get the new ingredient from the form
    $newIngredient = $request->input('ingredient');

    // Retrieve the existing shopping list from the session
    $shoppingList = session('shopping_list', []);

    // Add the new ingredient to the shopping list
    $shoppingList[] = $newIngredient;

    // Save the updated shopping list back to the session
    session(['shopping_list' => $shoppingList]);

    // Redirect back with a success message
    return redirect()->route('shopping.index')->with('success', 'Ingredient added successfully!');
        $request->validate([
            'ingredients' => 'required|array',
        ]);

        $shoppingList = new ShoppingList();
        $shoppingList->user_id = auth()->id();
        $shoppingList->ingredients = json_encode($request->input('ingredients'));
        $shoppingList->save();

        return redirect()->route('shopping.index')->with('success', 'Shopping list saved successfully!');
    }

    public function addUncheckedIngredients(Request $request)
    {
        session()->forget('shopping_list');
        \Log::info('Unchecked Ingredients:', $request->all());

    $uncheckedIngredients = $request->input('have', []);
    \Log::info('Filtered Unchecked Ingredients:', $uncheckedIngredients);

    $existingList = session('shopping_list', []);
    \Log::info('Session Data Before Saving:', $existingList);

    $updatedList = array_merge($existingList, $uncheckedIngredients);
    \Log::info('Updated Shopping List:', $updatedList);

    session(['shopping_list' => $updatedList]);

    return redirect()->route('shopping.index')->with('success', 'Unchecked ingredients added to your shopping list!');
}
// Add the delete method here
public function delete($index)
{
    // Retrieve the current shopping list from the session
    $shoppingList = session('shopping_list', []);

    // Remove the ingredient at the given index
    if (isset($shoppingList[$index])) {
        unset($shoppingList[$index]);
    }

    // Re-index the array to ensure proper ordering
    $shoppingList = array_values($shoppingList);

    // Save the updated list back to the session
    session(['shopping_list' => $shoppingList]);

    // Redirect back with a success message
    return redirect()->route('shopping.index')->with('success', 'Ingredient removed successfully!');
}
    }

