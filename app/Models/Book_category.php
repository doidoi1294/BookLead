<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book_category extends Model
{
    use HasFactory;
    
    public function getByCategory(int $limit_count = 5)
    {
         return $this->books()->with('book_category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //Bookに対するリレーション
    public function books(){
        return $this->hasMany(Book::class);
    }
}
