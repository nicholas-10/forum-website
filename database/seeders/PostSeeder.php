<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');
        $userIds = $userIds->toArray();
        for ($i=0; $i < 20; $i++) {
            $temp = Str::random(15);
            DB::table('posts')->insert([
                'title' => $temp,
                'content' => Str::random(900),
                'edited' => (rand(0, 1)) ? (true) : (false),
                'datetime_posted' => date("Y-m-d", rand(strtotime("2020-1-1"), strtotime("2024-12-31"))),
                'user_id' => $userIds[array_rand($userIds)],
                'slug'=>Str::of($temp)->slug('-')

            ]);
        }
    }
}
