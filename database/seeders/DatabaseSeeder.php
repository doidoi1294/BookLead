<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // シーダファイルの呼び出し
        $this->call([
                UserSeeder::class,
                CategorySeeder::class,
                PostSeeder::class,
                Book_categorySeeder::class,
                BookSeeder::class,
                DiarySeeder::class,
        ]);
    }
}
