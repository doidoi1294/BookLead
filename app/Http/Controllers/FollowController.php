<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FollowController;

class FollowController extends Controller
{
    //フォローする
    public function follow(User $user)
    {
        $auth_user = Auth::user();

        if (!$auth_user->is_user_followed_by_auth_user($user->id)) {
            Follow::create([
                'follower_id' => $auth_user->id,
                'followee_id' => $user->id,
            ]);
        }

        return redirect()->back();
    }
    //フォロー解除する
    public function unfollow(User $user)
    {
        $auth_user = Auth::user();

        $follow = Follow::where('follower_id', $auth_user->id)
                        ->where('followee_id', $user->id)
                        ->first();

        if ($follow) {
            $follow->delete();
        }

        return redirect()->back();
    }
}
