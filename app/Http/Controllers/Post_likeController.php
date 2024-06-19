<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Post_like;
use Illuminate\Support\Facades\Auth;

class Post_likeController extends Controller
{
    // いいね機能
    public function like(Post $post){
        Post_like::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            ]);
        
        session()->flash('success', 'You Liked the Reply.');

        return redirect()->back();
    }
    
    public function unlike(Post $post){
        $post_like = Post_like::where('post_id', $post->id)->where('user_id', Auth::id())->first();
        $post_like->delete();
    
        session()->flash('success', 'You Unliked the Reply.');
    
        return redirect()->back();
    }
}
