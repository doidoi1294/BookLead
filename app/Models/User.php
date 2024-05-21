<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'introduce'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Postに対するリレーション
    public function posts(){
        return $this->hasMany(Post::class);
    }
    //Post_likeに対するリレーション
    public function post_likes(){
        return $this->hasMany(Post_like::class);
    }
    //Commentに対するリレーション
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    //Comment_likeに対するリレーション
    public function comment_likes(){
        return $this->hasMany(Comment_like::class);
    }
    //Bookに対するリレーション
    public function books(){
        return $this->hasMany(Book::class);
    }
}
