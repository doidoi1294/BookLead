<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use DateTime;
// モデルの指定
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'title' => Str::random(10),
            'body' => Str::random(10),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
            DB::table('posts')->insert([
            'user_id' => 2,
            'category_id' => 1,
            'title' => Str::random(10),
            'body' => Str::random(10),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
