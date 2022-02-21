<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;

Route::get('/', [RegisterController::class, 'index'])->name('página-principal');

Route::post('/create', [RegisterController::class, 'store'])->name('criar');

Route::get('show/{id}', [RegisterController::class, 'show'])->name('mostrar-dados');

Route::delete('delete/{id}', [RegisterController::class, 'destroy'])->name('deletar');

Route::put('update/{id}', [RegisterController::class, 'update'])->name('atualizar');
