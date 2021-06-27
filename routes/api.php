<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{ RegisterController, LoginController };
use App\Http\Controllers\{ HomeController };

Route::middleware('auth:sanctum')->get('/athenticated', function (Request $request) {
    return response()->json($request->user());
});

Route::post('register' , [RegisterController::class, 'register']);
Route::post('login' , [LoginController::class, 'login']);
Route::post('logout' , [LoginController::class, 'logout']);

Route::get('home' , [HomeController::class, 'index']);