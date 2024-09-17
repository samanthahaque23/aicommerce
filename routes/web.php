<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Home page route
Route::get('/', [ProductController::class, 'index'])->name('home');



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
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('products', AdminController::class);
});
require __DIR__.'/auth.php';
