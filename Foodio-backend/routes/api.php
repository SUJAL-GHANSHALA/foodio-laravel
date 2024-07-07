<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;

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

// Public routes
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

// Seller routes
Route::middleware(['auth.jwt', 'isSeller'])->group(function() {
    Route::resource('restaurants', RestaurantController::class);
    Route::resource('meals', MealController::class);
    Route::get('/generate-qr-code', function () {
        $qrCode = QrCode::size(200)->generate('Hello, this is a QR code');
        return response($qrCode)->header('Content-Type', 'image/svg+xml');
    });
});

// Buyer routes
Route::middleware('auth.jwt')->group(function () {
    Route::resource('restaurants', RestaurantController::class)->only(['index', 'show']);
    Route::resource('meals', MealController::class)->only(['index', 'show']);
    Route::resource('reviews', ReviewController::class)->only(['store', 'index']);
    Route::resource('orders', OrderController::class)->only(['store', 'index', 'show']);
});
