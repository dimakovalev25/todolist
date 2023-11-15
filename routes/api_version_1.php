<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items', [\App\Http\Controllers\ItemController::class, 'index'])->name('index');

Route::prefix('/item')->group(function () {
   Route::post('/store', [\App\Http\Controllers\ItemController::class, 'store']);
   Route::put('/{id}', [\App\Http\Controllers\ItemController::class, 'update']);
   Route::delete('/{id}', [\App\Http\Controllers\ItemController::class, 'destroy']);
});


/*Route::get('/', function (){
   return \App\Models\Version::all();
});*/

Route::get('/latest_version', [\App\Http\Controllers\Api\Version_1\IndexController::class, 'index'])->name('latest_version');
Route::get('/all', [\App\Http\Controllers\Api\Version_1\IndexController::class, 'all'])->name('all_version');