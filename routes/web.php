<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route; // 'Route' is a default class of Laravel


// Admin pages gate
Route::get('/admins-only', function() {
    return 'Only admins should be able to see this page.';
})->middleware('can:visitAdminPages'); // ties back to the AppServiceProvider.php file

// User login and logout routes

// middleware('guest') - makes sure that someone ISN'T logged IN before executing function
// middleware('auth') - makes sure that someone IS logged IN before executing function

Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login'); // home page - name('login') is there for the create post function to redirect to if someone tries to access the create post page while not logged in
Route::post('/register', [UserController::class, 'register'])->middleware('guest'); // register HTML sign-up form
Route::post('/login', [UserController::class, 'login'])->middleware('guest'); // login
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth'); // logout
Route::get('/manage-avatar', [UserController::class, 'showAvatarForm'])->middleware('auth');
Route::post('/manage-avatar', [UserController::class, 'storeAvatar'])->middleware('auth');

// Follow related routes
Route::post('/create-follow/{user:username}', [FollowController::class, 'createFollow'])->middleware('auth');
Route::post('/remove-follow/{user:username}', [FollowController::class, 'removeFollow'])->middleware('auth');

// Blog post routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])->middleware('auth'); // middleware ('auth') runs before the actual function to make sure that a user is logged in and sends them to the login page if no-one is logged in - see above
Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('auth');
Route::get('/post/{post}', [PostController::class, 'viewSinglePost']);
Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware('can:delete,post'); // middleware blocks users from deleting other user's posts
Route::get('/post/{post}/edit', [PostController::class, 'showEditForm'])->middleware('can:update,post');
Route::put('/post/{post}', [PostController::class, 'actuallyUpdate'])->middleware('can:update,post');

// Profile related routes
Route::get('/profile/{user:username}', [UserController::class, 'profile']);
Route::get('/profile/{user:username}/followers', [UserController::class, 'profileFollowers']);
Route::get('/profile/{user:username}/following', [UserController::class, 'profileFollowing']);