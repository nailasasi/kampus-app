<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::resource('mahasiswa', MahasiswaController::class);