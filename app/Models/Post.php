<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    // ページネーション
    function getPaginateByLimit(int $limit_count = 5)
    {   
        // Eagerローディング機能
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    // fill関数で挿入できるデータベースの値を指定する
    protected $fillable = [
    'title',
    'body',
    'category_id'
    ];
    //Categoryに対するリレーション
    // 1対多なので相手側を「category」と単数形にする
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //Userに対するリレーション
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Post_likeに対するリレーション
    public function post_likes(){
        return $this->hasMany(Post_like::class);
    }
    //Commentに対するリレーション
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
}