<?php

use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CarController;
use App\Http\Controllers\API\ModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('brands', BrandController::class);
Route::apiResource('models', ModelController::class);
Route::apiResource('cars', CarController::class);
