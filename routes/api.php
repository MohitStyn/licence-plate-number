<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LisensePlateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::prefix('api/v1')->group(function () {
// });
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'signup']);
Route::middleware(['auth:sanctum','throttle:10,1'])->group( function () {
    Route::post('auth/logout',[AuthController::class,'logout']);
    Route::post('vehicle/inout',[LisensePlateController::class,'VehicaleInOut']);
});
