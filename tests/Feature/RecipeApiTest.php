use App\Models\User;
use Illuminate\Support\Facades\Http;
use function Pest\Laravel\{actingAs, getJson};

it('returns recipes from spoonacular for authenticated users', function () {
    $user = User::factory()->create();

    // Fake Spoonacular API response
    Http::fake([
        'api.spoonacular.com/*' => Http::response([
            'results' => [
                ['title' => 'Chicken Soup', 'id' => 123],
                ['title' => 'Beef Stew', 'id' => 456],
            ]
        ], 200),
    ]);

    actingAs($user, 'sanctum');

    getJson('/api/recipes?ingredients=chicken,tomato')
        ->assertOk()
        ->assertJson([
            ['title' => 'Chicken Soup'],
            ['title' => 'Beef Stew'],
        ]);
});
