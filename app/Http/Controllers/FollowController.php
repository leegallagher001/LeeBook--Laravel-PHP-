<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function createFollow(User $user) {
        // you cannot follow yourself

        if ($user->id == auth()->user()->id) {
            return back()->with('failure', 'Silly goose! - You cannot follow yourself!');
        }

        // you cannot follow someone you are already following

        $existCheck = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();

        if ($existCheck) {
            return back()->with('failure', 'Silly goose! -You are already following this particular silly goose.');
        }

        // if all is well

        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();

        return back()->with('success', '(Not so) silly goose! - You are now following this silly goose!');
    }

    public function removeFollow(User $user) {
        Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->delete();
        return back()->with('success', '(Unfortunate) silly goose! - You have successfully unfollowed this silly goose!');
    }
}
