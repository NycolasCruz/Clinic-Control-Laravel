<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;

Route::get('/', [RegisterController::class, 'index']);

Route::post('/', [RegisterController::class, 'store']);

Route::get('show/{id}', [RegisterController::class, 'show']);

Route::delete('show/{id}', [RegisterController::class, 'destroy']);

Route::put('show/{id}', [RegisterController::class, 'update']);
