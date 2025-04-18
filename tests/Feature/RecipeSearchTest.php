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
    $followed->assertSee('Tuna Salad');
});
