<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route; // 'Route' is a default class of Laravel

// User login and logout routes

Route::get('/', [UserController::class, "showCorrectHomepage"]); // home page
Route::post('/register', [UserController::class, 'register']); // register HTML sign-up form
Route::post('/login', [UserController::class, 'login']); // login
Route::post('/logout', [UserController::class, 'logout']); // logout

// Blog post routes
Route::get('/create-post', [PostController::class, 'showCreateForm']);
Route::post('/create-post', [PostController::class, 'storeNewPost']);