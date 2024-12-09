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
    public function save(Request $request)
{
    // Extract the ingredient names from the request
    $ingredients = $request->input('ingredients');

    // Example: Save to database or session (just the names)
    session(['shopping_list_saved' => $ingredients]);

    return response()->json(['message' => 'Shopping list saved successfully!']);
}
public function index()
{
    $shoppingLists = ShoppingList::where('user_id', auth()->id())->get();

    foreach ($shoppingLists as $list) {
        $list->ingredients = json_decode($list->ingredients, true); // Ensure it's an array
    }

    return view('saved-lists', compact('shoppingLists'));
}
public function destroy($id)
{
    // Fetch the shopping list and ensure it belongs to the authenticated user
    $shoppingList = ShoppingList::where('id', $id)->where('user_id', auth()->id())->first();

    if (!$shoppingList) {
        return redirect()->back()->with('error', 'Shopping list not found or you are not authorized to delete it.');
    }

    // Delete the shopping list
    $shoppingList->delete();

    return redirect()->route('shopping.index')->with('success', 'Shopping list deleted successfully.');
}


}
