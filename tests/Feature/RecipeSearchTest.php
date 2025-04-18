<?php
use App\Models\User;
use Illuminate\Support\Facades\Http;

test('it searches for recipes using Spoonacular in /recipes/search', function () {
    Http::fake([
        '*' => Http::response([
            'results' => [
                ['title' => 'Tuna Salad', 'id' => 555]
            ],
        ], 200),
    ]);

    $user = User::factory()->create();
    $this->actingAs($user);

   $response = $this->post('/recipes/search', [
    'ingredients' => 'tuna,lettuce',
]);

$response->assertRedirect(); // Ensure it redirects first

// Follow the redirect
$followed = $this->get($response->headers->get('Location'));

// Now assert the button and content
$followed->assertSee('Back to Search');  
$followed->assertSee('RecipeHub');  


});
