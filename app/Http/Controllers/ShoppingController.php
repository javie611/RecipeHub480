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
    }

