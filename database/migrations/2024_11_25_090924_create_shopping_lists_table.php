<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shopping_lists', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID for each shopping list
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for the user
            $table->json('ingredients'); // JSON field to store the ingredients list
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_lists');
    }
};
