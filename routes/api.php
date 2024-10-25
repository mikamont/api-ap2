<?php

use App\Http\Controllers\HeroiController;
use App\Http\Controllers\VilaoController;
use App\Models\Vilao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/heroi', [HeroiController::class, 'index']);
Route::get('/heroi/{id}', [HeroiController::class, 'show']);
Route::post('/heroi', [HeroiController::class, 'store']);
Route::put('/heroi/{id}', [HeroiController::class, 'update']);
Route::delete('/heroi/{id}', [HeroiController::class, 'destroy']);   

Route::get('/vilao', [VilaoController::class, 'index']);
Route::get('/vilao/{id}', [VilaoController::class, 'show']);
Route::post('/vilao', [VilaoController::class, 'store']);
Route::put('/vilao/{id}', [VilaoController::class, 'update']);
Route::delete('/vilao/{id}', [VilaoController::class, 'destroy']);   




