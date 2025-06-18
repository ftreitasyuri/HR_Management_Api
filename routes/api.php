<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/status', function (){
    return response()->json(
        [
            'status' => 'OK',
            'message' => 'API is Running'
        ], 200
    );
})->middleware('auth:sanctum');

Route::apiResource('funcionarios', FuncionarioController::class)->middleware('auth:sanctum');;

// Auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// routes/api.php
Route::post('/enviar-link-formulario', [FuncionarioController::class, 'enviarLink'])->middleware('auth:sanctum');
