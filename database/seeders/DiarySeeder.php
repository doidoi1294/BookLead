<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use DateTime;
// モデルの指定
use App\Models\Diary;

class DiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('diaries')->insert([
            'book_id' => 1,
            'date' => '2024-06-30',
            'page' => 100,
            'body' => Str::random(10),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
            DB::table('diaries')->insert([
            'book_id' => 2,
            'date' => '2024-07-01',
            'page' => 200,
            'body' => Str::random(10),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
