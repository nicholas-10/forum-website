<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "admine",
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('password'),
            'age' => rand(18, 30),
            'gender' => 'Male',
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => "sam",
            'email' => 'sam@gmail.com',
            'password' =>  Hash::make('password'),
            'age' => rand(18, 30),
            'gender' => 'Male',
            'is_admin' => true,
        ]);
        for ($i=0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@example.com',
                'password' => Hash::make('password'),
                'age' => rand(18, 30),
                'gender' => 'Male',
                'is_admin' => false,
            ]);

        }
    }
}
