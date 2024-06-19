<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    //フォローする
    public function follow(Request $request)
    {
        Follow::firstOrCreate([
            'follower_id' => $request->auth_user,
            'followee_id' => $request->post_user
        ]);
        return redirect()->back();
    }
    //フォロー解除する
    public function unfollow(Request $request)
    {
        $follow = Follow::where('follower_id', $request->auth_user)
            ->where('followee_id', $request->post_user)
            ->first();
        if ($follow) {
            $follow->delete();
        }
        return redirect()->back();
    }
}
