<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ContenidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']) 
                ->name('logout');

    Route::apiResource('categorias', CategoriaController::class);


    Route::get('categorias/{categoria}/contenidos', [ContenidoController::class, 'index']);
    Route::post('categorias/{categoria}/contenidos', [ContenidoController::class, 'store']);

    Route::get('contenidos/{contenido}', [ContenidoController::class, 'show']);
    Route::put('contenidos/{contenido}', [ContenidoController::class, 'update']);
    Route::delete('contenidos/{contenido}', [ContenidoController::class, 'destroy']);
});