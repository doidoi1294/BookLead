<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    
    // 配列内の要素を書き込み可能にする
    protected $fillable = ['follower_id','followee_id'];
    
    // Userに対するリレーション
    public function user(){
        return $this->belongsTo(User::class);
    }
}
