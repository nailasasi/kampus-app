<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/dosen', [DosenController::class, 'index']);
Route::get('/dosen/create', [DosenController::class, 'create']);
Route::post('/dosen/store', [DosenController::class, 'store']);
Route::get('/dosen/{id}/edit', [DosenController::class, 'edit']);
Route::put('/dosen/{id}', [DosenController::class, 'update']);
Route::delete('/dosen/{id}', [DosenController::class, 'destroy']);

Route::get('/mata-kuliah', [MataKuliahController::class, 'index']);
Route::get('/mata-kuliah/create', [MataKuliahController::class, 'create']);
Route::post('/mata-kuliah/store', [MataKuliahController::class, 'store']);
Route::get('/mata-kuliah/{id}/edit', [MataKuliahController::class, 'edit']);
Route::put('/mata-kuliah/{id}', [MataKuliahController::class, 'update']);
Route::delete('/mata-kuliah/{id}', [MataKuliahController::class, 'destroy']);