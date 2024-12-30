<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/utilizadores')->group(function () {
    Route::get('/', [RegisteredUserController::class, 'index']);
    Route::post('/criar', [RegisteredUserController::class, 'store']);
    Route::get('/{id}', [RegisteredUserController::class, 'show']);
    Route::put('/editar/{id}', [RegisteredUserController::class, 'update']);
});
