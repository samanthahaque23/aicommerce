<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Home page route
Route::get('/', [ProductController::class, 'index'])->name('home');

// Route for top-loved products
Route::get('/top_loved', [ProductController::class, 'showTopLoved'])->name('product.top_loved');

// Route to show the recommendation form (GET)
Route::get('/recommend', [ProductController::class, 'showRecommendationForm'])->name('product.recommend_form');

// Route to handle the recommendation request (POST)
Route::post('/recommend', [ProductController::class, 'getRecommendations'])->name('product.recommend');

// Route for viewing a single product
Route::get('/product/{product:slug}', [ProductController::class, 'view'])->name('product.view');
Route::get('/product/{slug}/description', [ProductController::class, 'showDescription'])->name('product.description');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
