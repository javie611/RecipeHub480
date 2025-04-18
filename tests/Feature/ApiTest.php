use Illuminate\Support\Facades\Http;
use function Pest\Laravel\get;

it('fetches recipes from Spoonacular in /test-api', function () {
    Http::fake([
        'api.spoonacular.com/*' => Http::response([
            'results' => [
                ['title' => 'Pasta Carbonara', 'id' => 101],
            ]
        ], 200),
    ]);

    get('/test-api')
        ->assertOk()
        ->assertJson([
            'results' => [
                ['title' => 'Pasta Carbonara', 'id' => 101],
            ]
        ]);
});
