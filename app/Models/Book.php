<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    
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
