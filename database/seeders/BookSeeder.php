<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use DateTime;
// モデルの指定
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'user_id' => 1,
            'book_category_id' => 1,
            'title' => Str::random(10),
            'author' => Str::random(10),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
            DB::table('books')->insert([
            'user_id' => 2,
            'book_category_id' => 2,
            'title' => Str::random(10),
            'author' => Str::random(10),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
