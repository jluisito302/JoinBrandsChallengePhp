<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'index']);

Route::get('/login', [AuthController::class, 'index']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/forgot_password', [AuthController::class, 'forgot_password']);
Route::post('/next_reset_password', [AuthController::class, 'next_reset_password']);
Route::post('/reset_password', [AuthController::class, 'reset_password']);
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/register',[AuthController::class, 'registerUser']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[UserController::class, 'dashboard']);
    Route::get('/logout',[UserController::class, 'logout']);
    Route::resource('/users',UserController::class);
    Route::get('/change_status/{id}', [UserController::class, 'changeStatus']);
    Route::get('/profile', [UserController::class, 'profile']);
});
