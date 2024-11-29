<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class , 'register'])->name('register') ;   //tampilan register
Route::post('/register', [AuthController::class , 'store']) ;      // logic register

Route::get('/login', [AuthController::class , 'login'])->name('login') ;           //tampilan login
Route::post('/login', [AuthController::class , 'authenticate']) ;   //logic login

Route::post('/logout', [AuthController::class , 'logout'])->name('logout') ;
