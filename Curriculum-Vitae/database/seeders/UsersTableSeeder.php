<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Nguyen Dang Phuong',
            'email' => 'nguyendangphuong@gmail.com',
            'password'=> Hash::make('abcabc'),
            'verified' => true,
            'verification_code' => '311002',
            'reset_password_code' => '311002',
        ]);
    }
}
