use Illuminate\Support\Facades\Http;
use function Pest\Laravel\post;

it('searches for recipes using Spoonacular in /recipes/search', function () {
    Http::fake([
        'api.spoonacular.com/*' => Http::response([
            ['title' => 'Tuna Salad', 'id' => 555]
        ], 200),
    ]);

    post('/recipes/search', [
        'ingredients' => 'tuna,lettuce',
    ])
        ->assertOk() // or assertRedirect, if it redirects to a view
        ->assertSee('Tuna Salad'); // adjust based on what the response returns
});
