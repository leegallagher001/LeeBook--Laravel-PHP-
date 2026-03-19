<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function storeNewPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']); // strip HTML tags that malicious users might use 
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id(); // gets the dynamic user id value that is logged in to that particular session

        Post::create($incomingFields);
    }

    public function showCreateForm() {
        return view('create-post');
    }
}
