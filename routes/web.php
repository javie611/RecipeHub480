<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact'); 
})->name('contact');

Route::get('/favorites', function () {
    return view('favorites
'); 
})->name('favorites');

Route::get('/posts', function () {
    return view('posts'); 
})->name('posts');

Route::get('/recipes', function () {
    return view('recipes'); 
})->name('recipes');

Route::get('/shopping', function () {
    return view('shopping'); 
})->name('shopping');
});


Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login'); // Removed guest middleware

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register'); // Removed guest middleware

Route::post('/register', [RegisteredUserController::class, 'store']);



Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
    
require __DIR__.'/auth.php';
