<?php

use App\Http\Controllers\Api\LigaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('liga', [LigaController::class, 'index']);
Route::post('liga', [LigaController::class, 'store']);
Route::get('liga/{id}', [LigaController::class, 'show']);
Route::put('liga/{id}', [LigaController::class, 'update']);
Route::delete('liga/{id}', [LigaController::class, 'destroy']);
