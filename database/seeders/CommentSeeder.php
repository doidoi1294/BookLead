<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use DateTime;
// モデルの指定
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('comments')->insert([
            'comment_id' => 1,
            'comment' => Str::random(10),
            'user_id' => 1,
            'post_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
            DB::table('comments')->insert([
            'comment_id' => 2,
            'comment' => Str::random(10),
            'user_id' => 2,
            'post_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
