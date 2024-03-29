<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

Route::get('/ping', function():JsonResponse {
    return response()->json(['Pong' => true]);
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/states', [StatesController::class, 'index']);

Route::get('/user/me', [UserController::class, 'me'])->middleware('auth:sanctum');

Route::post('/user/signup', [UserController::class, 'signup']);
Route::post('/user/signin', [UserController::class, 'signin']);
