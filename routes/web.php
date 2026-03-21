<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route; // 'Route' is a default class of Laravel

// User login and logout routes

// middleware('guest') - makes sure that someone ISN'T logged IN before executing function
// middleware('auth') - makes sure that someone IS logged IN before executing function

Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login'); // home page - name('login') is there for the create post function to redirect to if someone tries to access the create post page while not logged in
Route::post('/register', [UserController::class, 'register'])->middleware('guest'); // register HTML sign-up form
Route::post('/login', [UserController::class, 'login'])->middleware('guest'); // login
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth'); // logout

// Blog post routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])->middleware('auth'); // middleware ('auth') runs before the actual function to make sure that a user is logged in and sends them to the login page if no-one is logged in - see above
Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('auth');
Route::get('/post/{post}', [PostController::class, 'viewSinglePost']);

// Profile related routes
Route::get('/profile/{user:username}', [UserController::class, 'profile']);