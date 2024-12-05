<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userIds = DB::table('users')->pluck('id');
        $userIds = $userIds->toArray();
        $postIds = DB::table('posts')->pluck('id');
        $postIds = $postIds->toArray();
        for ($i=0; $i < 300; $i++) {
            DB::table('likes')->insert([
                'user_id' => $userIds[array_rand($userIds)],
                'post_id' => $postIds[array_rand($postIds)]
            ]);
        }

    }
}
