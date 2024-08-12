<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\CorsMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public route for login with CORS middleware
Route::middleware([CorsMiddleware::class])->group(function () {
    Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
});

// Routes protected by Sanctum authentication, admin middleware, and CORS
Route::middleware(['auth:sanctum', 'admin', CorsMiddleware::class])->group(function () {
    Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'getUser']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::apiResource('/product', ProductController::class);
});
