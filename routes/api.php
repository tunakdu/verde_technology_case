<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\Api\OfferController as ApiOfferController;
use App\Http\Controllers\Api\OrderController as ApiOrderController;



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


Route::post('login', [AuthController::class, 'login']);
Route::get('login', [AuthController::class, 'login'])->name('login');

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::apiResource('products', ProductController::class);

    Route::apiResource('offers', OfferController::class);

    Route::apiResource('orders', OrderController::class);
});


