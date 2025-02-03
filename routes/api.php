<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication routes
 */
Route::post('/sign-up', [UserController::class, 'storeUser']);
Route::post('/sign-in', [UserController::class, 'signIn']);

/**
 * Protected routes
 */
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/sign-out', [UserController::class, 'signOut']);
    Route::resource('/transactions', TransactionController::class);
});