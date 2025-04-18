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

    $response->assertRedirect();

   $followed = $this->get($response->headers->get('Location'));
$followed->assertSee('Back to Search');  // Assuring the button is in the layout
$followed->assertSee('RecipeHub');  // Confirm the page loads the correct title

});
