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
        DB::table('posts')->insert([
            'title' => 'Do Women Really Lived Longer than Men?',
            'datetime_posted' => date("Y-m-d", rand(strtotime("2020-1-1"), strtotime("2024-12-31"))),
            'user_id' => $userIds[array_rand($userIds)],
            'content' => 'I saw some data that said men has a higher death rate than women. Is that really true?',
            'edited' => (rand(0, 1)) ? true : false,
        ]);
        DB::table('posts')->insert([
            'title' => 'The Feminist Movement Destroyed My Lawn',
            'datetime_posted' => date("Y-m-d", rand(strtotime("2020-1-1"), strtotime("2024-12-31"))),
            'user_id' => $userIds[array_rand($userIds)],
            'content' => 'They decided to hold it in front of my house and now it is trampled and littered! This is outrageous!',
            'edited' => (rand(0, 1)) ? true : false,
        ]);
    }
}
