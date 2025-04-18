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

// Assert that the response contains the recipe title or an ingredient like "Tuna"
$followed->assertSee('Tuna Salad');  // Assuring the recipe title is in the layout
$followed->assertSee('Tuna');        // Confirm that "Tuna" is listed as an ingredient


});
