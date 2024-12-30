<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SubjectController;
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

Route::prefix('/faculdades')->group(function () {
    Route::get('/', [FacultyController::class, 'index']);
    Route::post('/criar', [FacultyController::class, 'store']);
    Route::get('/{id}', [FacultyController::class, 'show']);
    Route::put('/editar/{id}', [FacultyController::class, 'update']);
});

Route::prefix('/cursos')->group(function () {
    Route::get('/', [CourseController::class, 'index']);
    Route::post('/criar', [CourseController::class, 'store']);
    Route::get('/{id}', [CourseController::class, 'show']);
    Route::put('/editar/{id}', [CourseController::class, 'update']);
});

Route::prefix('/disciplinas')->group(function () {
    Route::get('/', [SubjectController::class, 'index']);
    Route::post('/criar', [SubjectController::class, 'store']);
    Route::get('/{id}', [SubjectController::class, 'show']);
    Route::put('/editar/{id}', [SubjectController::class, 'update']);
});
