<?php
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

use App\Models\User;
use function Pest\Laravel\{post, get};

it('logs in a user with valid credentials', function () {
    $user = User::factory()->create([
        'password' => bcrypt('secret123'),
    ]);

    $response = post('/login', [
        'email' => $user->email,
        'password' => 'secret123',
    ]);

    $response->assertRedirect('/dashboard');
    expect(auth()->user()->is($user))->toBeTrue();
});

it('fails login with invalid credentials', function () {
    $user = User::factory()->create();

    post('/login', [
        'email' => $user->email,
        'password' => 'wrongpassword',
    ])->assertSessionHasErrors();
});
