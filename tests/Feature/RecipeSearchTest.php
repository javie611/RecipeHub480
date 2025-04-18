<?php
use App\Models\User;
use Illuminate\Support\Facades\Http;

it('searches for recipes using Spoonacular', function () {
    // Send a post request to the search endpoint with a query
    $response = $this->post('/recipes/search', [
        'ingredients' => 'tuna,lettuce',  // Or any ingredients you want to test
    ]);
    
    // Assert that the response is a redirect (it might redirect to a results page)
    $response->assertRedirect();  // You can also assert specific redirection if needed
});
