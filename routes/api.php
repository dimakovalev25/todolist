<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items', [\App\Http\Controllers\ItemController::class, 'index']);

Route::prefix('/item')->group(function () {
   Route::post('/store', [\App\Http\Controllers\ItemController::class, 'store']);
   Route::put('/{id}', [\App\Http\Controllers\ItemController::class, 'update']);
   Route::delete('/{id}', [\App\Http\Controllers\ItemController::class, 'destroy']);
});