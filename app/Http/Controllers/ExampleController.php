<?php

// when a request comes in, the controller essentially acts as a manager, delegating tasks to the other pages

// nothing in here is used in this app, and I have just kept it around for demonstration purposes

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class LeeBookController extends Controller
{
    public function homepage() {
        // image we are loading data from a database

        $ourName = 'Lee'; // the controller passes dynamic data to the view; the view's only resposibility is displaying the data and view
        $animals =['Meowsalot', 'Barksalot', 'Purrsloud'];

        return view('homepage', ['allAnimals' => $animals, 'name' => $ourName, 'catname' => 'Meowsalot']); // in this case, delegating the task to the view 'homepage'
    }

    public function aboutpage() {
        return view('single-post');
    }
}
