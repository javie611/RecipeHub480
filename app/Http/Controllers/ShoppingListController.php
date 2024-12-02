<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;

class ShoppingListController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ingredients' => 'required|array',
            'ingredients.*' => 'string|max:255',
        ]);

        // Save shopping list to the database
        $shoppingList = new ShoppingList();
$shoppingList->user_id = auth()->id(); // Assuming you're using Laravel's authentication
$shoppingList->ingredients = json_encode($request->ingredients);
$shoppingList->save();


        return response()->json(['message' => 'Shopping list saved successfully!']);
    }
}
