<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use DateTime;
// モデルの指定
use App\Models\Post_like;

class Post_likeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_likes')->insert([
            'user_id' => 1,
            'post_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
            DB::table('post_likes')->insert([
            'user_id' => 3,
            'post_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
