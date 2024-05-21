<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_like extends Model
{
    use HasFactory;
    
    //Userに対するリレーション
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Commentに対するリレーション
    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
