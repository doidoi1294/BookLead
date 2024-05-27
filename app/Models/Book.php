<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {   
        // Eagerローディング機能
        return $this::with('book_category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // fill関数で挿入できるデータベースの値を指定する
    protected $fillable = [
    'title',
    'author',
    'image_url',
    'book_category_id',
    'user_id',
    ];
    // Userに対するリレーション
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Categoryに対するリレーション
    public function book_category(){
        return $this->belongsTo(Book_category::class);
    }
    //Diaryに対するリレーション
    public function diaries(){
        return $this->hasMany(Diary::class);
    }
}
