<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('owners', App\Http\Controllers\OwnerController::class);
Route::apiResource('autos', App\Http\Controllers\AutoController::class);

Route::get('/autos/{id}/transactions', [\App\Http\Controllers\TransactionController::class, 'transactionByAutoId']);
Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'index']);
Route::post('/transactions', [\App\Http\Controllers\TransactionController::class, 'store']);



