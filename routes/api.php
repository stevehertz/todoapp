<?php

use App\Http\Controllers\Items\ItemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items', [ItemsController::class, 'index']);

Route::prefix('/item')->group(function(){

    Route::post('/store', [ItemsController::class, 'store']);

    Route::get('/{item}', [ItemsController::class, 'show']);

    Route::put('/{item}', [ItemsController::class, 'update']);

    Route::delete('/{item}', [ItemsController::class, 'destroy']);

});
