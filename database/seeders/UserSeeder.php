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
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'age' => rand(18, 30),
            'gender' => 'Male',
            'is_admin' => true
        ]);
        DB::table('users')->insert([
            'name' => "Sam",
            'email' => 'sam@gmail.com',
            'password' => Hash::make('password'),
            'age' => rand(18, 30),
            'gender' => 'Male',
            'is_admin' => false
        ]);
        DB::table('users')->insert([
            'name' => "Jill",
            'email' => 'jill@gmail.com',
            'password' => Hash::make('password'),
            'age' => rand(18, 30),
            'gender' => 'Female',
            'is_admin' => false
        ]);
        DB::table('users')->insert([
            'name' => "John",
            'email' => 'john@gmail.com',
            'password' => Hash::make('password'),
            'age' => rand(18, 30),
            'gender' => 'Male',
            'is_admin' => false
        ]);
    }
}
