<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// 追記
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '土井克真',
            'email' => 'h520524b@mails.cc.ehime-u.ac.jp',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('2Nino5Nakano'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test1294@gmail.com',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('test1294'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        // foreach ($users as $user) {
        //     DB::table('users')->insert($user);
        // }
    }
}