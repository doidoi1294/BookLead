<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_like extends Model
{
    use HasFactory;
    
    // 配列内の要素を書き込み可能にする
    protected $fillable = ['post_id','user_id'];
    
    //Userに対するリレーション
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Postに対するリレーション
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
