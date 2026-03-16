<?php

use Illuminate\Support\Facades\Route; // 'Route' is a default class of Laravel
use App\Http\Controllers\LeeBookController;

Route::get('/', [LeeBookController::class, "homepage"]); // home page
Route::get('/about', [LeeBookController::class, "aboutpage"]); // about page