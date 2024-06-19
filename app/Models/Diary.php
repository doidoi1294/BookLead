<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diary extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    // public function getPaginateByLimit(int $limit_count = 5)
    // {   
    //     // Eagerローディング機能
    //     return $this::with('book_category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    // }
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // fill関数で挿入できるデータベースの値を指定する
    protected $fillable = [
    'book_id',
    'date',
    'page',
    'body',
    
    ];
    
    //Bookに対するリレーション
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
