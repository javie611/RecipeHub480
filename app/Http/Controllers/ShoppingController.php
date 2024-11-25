<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingLists;

class ShoppingController extends Controller
{
    public function index()
    {
        // Fetch shopping lists for the logged-in user (if applicable)
        $shoppingLists = ShoppingList::where('user_id', auth()->id())->get(); 

        return view('shopping.index', compact('shoppingLists'));
    }

    public function store(Request $request)
    {
        // Validate and save the shopping list
        $request->validate([
            'ingredients' => 'required|array',  // Validate that ingredients is an array
        ]);

        // Save the ingredients to the shopping list table
        $shoppingList = new ShoppingList();
        $shoppingList->user_id = auth()->id();  // Save the user_id if using authenticated users
        $shoppingList->ingredients = json_encode($request->input('ingredients')); // Save ingredients as JSON
        $shoppingList->save();

        // Redirect to the shopping index page
        return redirect()->route('shopping.index')->with('success', 'Shopping list saved successfully!');
    }
}

