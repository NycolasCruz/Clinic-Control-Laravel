<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;

Route::get('/', [RegisterController::class, 'index']);

Route::post('/create', [RegisterController::class, 'store']);

Route::get('show/{id}', [RegisterController::class, 'show']);

Route::delete('delete/{id}', [RegisterController::class, 'destroy']);

Route::put('update/{id}', [RegisterController::class, 'update']);
