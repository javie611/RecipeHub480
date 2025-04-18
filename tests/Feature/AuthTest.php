use App\Models\User;
use function Pest\Laravel\{actingAs, get, post};

it('allows users to log in', function () {
    $user = User::factory()->create([
        'password' => bcrypt('secret'),
    ]);

    $response = post('/login', [
        'email' => $user->email,
        'password' => 'secret',
    ]);

    $response->assertRedirect('/home');
    $this->assertAuthenticatedAs($user);
});

it('rejects invalid login', function () {
    post('/login', [
        'email' => 'wrong@example.com',
        'password' => 'wrongpassword',
    ])->assertSessionHasErrors();
});
