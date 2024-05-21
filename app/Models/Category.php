<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    //Postモデルに対するリレーション
    // 1対多の関係なので相手側の方を「posts」と複数形にする
    public function posts(){
        return $this->hasMany(Post::class);
    }
    // カテゴリーに属する投稿を取得する
    public function getByCategory(int $limit_count = 5)
    {
         return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
