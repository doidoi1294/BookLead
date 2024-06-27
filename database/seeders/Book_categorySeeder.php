<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Book_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_categories')->insert([
            'name' => '小説',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('book_categories')->insert([
            'name' => '自己啓発本',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('book_categories')->insert([
            'name' => '専門書',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('book_categories')->insert([
            'name' => 'その他',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
