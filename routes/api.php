<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamisaController;
use App\Http\Controllers\CalcadoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rotas manuais para CamisaController
Route::get('/camisas', [CamisaController::class, 'index']); 
Route::post('/camisas', [CamisaController::class, 'store']); 
Route::get('/camisas/{id}', [CamisaController::class, 'show']);  
Route::put('/camisas/{id}', [CamisaController::class, 'update']); 
Route::delete('/camisas/{id}', [CamisaController::class, 'destroy']);


// Rotas manuais para CalcadoControlle
Route::get('/calcados', [CalcadoController::class, 'index']);
Route::post('/calcados', [CalcadoController::class, 'store']);
Route::get('/calcados/{id}', [CalcadoController::class, 'show']);
Route::put('/calcados/{id}', [CalcadoController::class, 'update']);
Route::delete('/calcados/{id}', [CalcadoController::class, 'destroy']); 