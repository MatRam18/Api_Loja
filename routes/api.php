<?php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamisaController;
use App\Http\Controllers\CalcadoController;
 
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 
// ROTAS INGREDIENTES
 
Route::get('/Camisa', [CamisaController::class, 'index']);
 
Route::get('/Camisa/{Camisa}', [CamisaController::class, 'show']);
 
Route::post('/Camisa', [CamisaController::class, 'store']);
 
Route::put('/Camisa/{Camisa}', [CamisaController::class, 'update']);
 
Route::delete('/Camisa/{Camisa}', [CamisaController::class, 'destroy']);
 
 
// ROTAS RECEITAS
 
Route::get('/Calcados', [CalcadosController::class, 'index']);
 
Route::get('/Calcados/{Calcados}', [CalcadosController::class, 'show']);
 
Route::post('/Calcados', [CalcadosController::class, 'store']);
 
Route::put('/Calcados/{Calcados}', [CalcadosController::class, 'update']);
 
Route::delete('/Calcados/{Calcados}', [CalcadosController::class, 'destroy']);