<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postIds = DB::table('posts')->pluck('id');
        $userIds = DB::table('users')->pluck('id');
        $postIds = $postIds->toArray();
        $userIds = $userIds->toArray();
        for ($i=0; $i < 500; $i++) {
            DB::table('comments')->insert([
                'content' => Str::random(900),
                'edited' => (rand(0, 1)) ? (true) : (false),
                'datetime_commented' => date("Y-m-d", rand(strtotime("2020-1-1"), strtotime("2024-12-31"))),
                'user_id' => $userIds[array_rand($userIds)],
                'post_id' => $postIds[array_rand($postIds)]

            ]);
        }
    }
}
