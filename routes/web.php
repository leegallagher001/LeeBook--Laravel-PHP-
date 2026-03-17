<?php

use Illuminate\Support\Facades\Route; // 'Route' is a default class of Laravel
use App\Http\Controllers\LeeBookController;
use App\Http\Controllers\UserController;

Route::get('/', [LeeBookController::class, "homepage"]); // home page
Route::get('/about', [LeeBookController::class, "aboutpage"]); // about page

Route::post('/register', [UserController::class, 'register']); // register HTML sign-up form