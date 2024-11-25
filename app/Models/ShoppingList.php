<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ingredients']; // Make sure the user_id and ingredients can be mass assigned

    protected $casts = [
        'ingredients' => 'array', // Cast ingredients to an array when interacting with the model
    ];
}

