<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// 追記
use Illuminate\Support\Facades\DB;
use DateTime;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // すべてのユーザーを取得
        $users = DB::table('users')->get();

        foreach ($users as $follower) {
            foreach ($users as $followee) {
                if ($follower->id !== $followee->id) {
                    DB::table('follows')->insert([
                        'follower_id' => $follower->id,
                        'followee_id' => $followee->id,
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime(),
                    ]);
                }
            }
        }
    }
}
