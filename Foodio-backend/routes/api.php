<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

// public routes
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

// seller routes
Route::middleware(['auth.jwt', 'isSeller'])->group(function() {
    //for seller

    //QR code generation
    Route::get('/generate-qr-code', function () {
        $qrCode = QrCode::size(200)->generate('Hello, this is a QR code');
        return response($qrCode)->header('Content-Type', 'image/svg+xml');
    });
});

// buyer  routes
Route::middleware('auth.jwt')->group(function () {
    //for buyer
});


