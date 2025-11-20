<?php

use App\Http\Controllers\Api\BlogPostApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\StockApiController;
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

Route::prefix('users')->group(function () {
    Route::get('/', [UserApiController::class, 'index']);
    Route::get('/{id}', [UserApiController::class, 'show']);
    Route::post('/', [UserApiController::class, 'store']);
    Route::put('/{id}', [UserApiController::class, 'update']);
    Route::delete('/{id}', [UserApiController::class, 'destroy']);

    // Export Excel/PDF
    Route::get('/export/excel', [UserApiController::class, 'exportExcel']);
    Route::get('/export/pdf', [UserApiController::class, 'exportPDF']);
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductApiController::class, 'index']);        // List all products
    Route::get('/{id}', [ProductApiController::class, 'show']);    // Detail product
    Route::post('/', [ProductApiController::class, 'store']);      // Create new product
    Route::put('/{id}', [ProductApiController::class, 'update']);  // Update product
    Route::delete('/{id}', [ProductApiController::class, 'destroy']); // Delete product
});

// Stock routes
Route::prefix('stocks')->group(function () {
    Route::get('/', [StockApiController::class, 'index']);        // List all stocks
    Route::get('/{id}', [StockApiController::class, 'show']);    // Detail stock
    Route::post('/', [StockApiController::class, 'store']);      // Create new stock
    Route::put('/{id}', [StockApiController::class, 'update']);  // Update stock
    Route::delete('/{id}', [StockApiController::class, 'destroy']); // Delete stock
});