<?php
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use App\Models\User;

uses(RefreshDatabase::class);

use function Pest\Laravel\post;

it('searches for recipes using Spoonacular in /recipes/search', function () {
    Http::fake([
        'api.spoonacular.com/*' => Http::response([
            ['title' => 'Tuna Salad', 'id' => 555]
        ], 200),
    ]);

     $user = User::factory()->create();
    actingAs($user); // ← Simulate login
    
    $response = post('/recipes/search', [
    'ingredients' => 'tuna,lettuce',
]);

$response->assertRedirect(); // step 1: check redirect

$followed = get($response->headers->get('Location')); // step 2: follow manually
$followed->assertSee('Tuna Salad'); // step 3: assert content
 // adjust based on what the response returns
});
