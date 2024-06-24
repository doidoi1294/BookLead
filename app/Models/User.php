<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

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
    // Followテーブルに対するリレーション
    // public function follows(){
    //     return $this->hasMany(Follow::class);
    // }
    public function follows()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }
    // フォローしているユーザーのリレーション
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followee_id');
    }

    // フォローされているユーザーのリレーション
    public function followees()
    {
        return $this->belongsToMany(User::class, 'follows', 'followee_id', 'follower_id');
    }
    
    // フォローされるいるかどうかの判定
    public function is_user_followed_by_auth_user($target_user_id)
    {
        $auth_user_id = Auth::id();
        return $this->follows()->where('followee_id', $target_user_id)->exists();
    }
}
