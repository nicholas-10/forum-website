<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userIds = DB::table('users')->pluck('id');
        $userIds = $userIds->toArray();
        $commentIds = DB::table('comments')->pluck('id');
        $commentIds = $commentIds->toArray();
        for ($i=0; $i < 1000; $i++) {
            DB::table('comment_likes')->insert([
                'user_id' => $userIds[array_rand($userIds)],
                'comment_id' => $commentIds[array_rand($commentIds)]
            ]);
        }

    }
}
