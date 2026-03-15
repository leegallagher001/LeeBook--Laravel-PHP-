<?php

use Illuminate\Support\Facades\Route; // 'Route' is a default class of Laravel

Route::get('/', function () {
    return '<h1>LeeBook - Home Page</h1><a href="/about">About Page</a>';
});

Route::get('/about', function () { // "::get" calls a static function/method within the 'Route' class (in this case a 'get' request)
    return '<h1>LeeBook - About Page</h1><a href="\">Back To Home</a>';
});