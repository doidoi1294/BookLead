<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    //Userに対するリレーション
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Postに対するリレーション
    public function post(){
        return $this->belongsTo(Post::class);
    }
    //Comment_likeに対するリレーション
    public function comment_likes(){
        return $this->hasMany(Comment_like::class);
    }
}
