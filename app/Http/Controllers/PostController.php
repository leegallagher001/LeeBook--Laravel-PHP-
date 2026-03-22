<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function actuallyUpdate(Post $post, Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']); // strip HTML tags that malicious users might use 
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        return back()->with('success', 'Post successfully updated!');

    }

    public function showEditForm(Post $post) {
        return view('edit-post', ['post' => $post]);
    }

    public function delete(Post $post) {
        $post->delete();

        return redirect('/profile/' . auth()->user()->username)->with('success', 'Post successfully deleted.');
    }

    public function viewSinglePost(Post $post) { // an example of type hinting
        $post['body'] = strip_tags(Str::markdown($post->body), '<p><ul><ol><li><strong><em><br>'); // strips tags but allows a list of allowable HTML tags
        return view('single-post', ['post' => $post]);
    }

    public function storeNewPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']); // strip HTML tags that malicious users might use 
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id(); // gets the dynamic user id value that is logged in to that particular session

        $newPost = Post::create($incomingFields);

        return redirect("/post/{$newPost->id}")->with('success', 'New post successfully created!');
    }

    public function showCreateForm() {
        return view('create-post');
    }
}
