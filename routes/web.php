<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    // abort(403, 'Unauthorized Access');
    return view('auth/autenticar');
})->name('login')->middleware('guest');

// Route::get('/', [FuncionarioController::class, 'retornaAuth'])->name('retornaAuth');
Route::post('/autenticando_funcionario', [AuthController::class, 'autenticando'])->name('autenticando_funcionario')->middleware('guest');



Route::get('/formulario_funcionario', [AuthController::class, 'direciona'])->name('direciona_form')->middleware('auth');



Route::post('/criando_funcionario', [FuncionarioController::class, 'store'])->name('criando_func')->middleware('auth');

