<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeeBookController extends Controller
{
    public function homepage() {
        return view('homepage');
    }

    public function aboutpage() {
        return '<h1>LeeBook - About Page (Controller)</h1><a href="\">Back To Home</a>';
    }
}
