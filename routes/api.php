<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{ RegisterController, LoginController };
use App\Http\Controllers\{ HomeController, CategoryController };

Route::middleware('auth:sanctum')->get('/athenticated', function (Request $request) {
    return response()->json($request->user());
});

Route::post('register' , [RegisterController::class, 'register']);
Route::post('login' , [LoginController::class, 'login']);
Route::post('logout' , [LoginController::class, 'logout']);

Route::get('home' , [HomeController::class, 'index']);

Route::prefix('category')->group(function () {
    Route::get('tipos' , [CategoryController::class, 'findAllTipos']);
    Route::get('marcas' , [CategoryController::class, 'findByTipoMarcas']);
    Route::get('modelos' , [CategoryController::class, 'findByMarcaModelos']);
    Route::get('versoes' , [CategoryController::class, 'findByModeloVersoes']);
});
