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
            'username' => 'Nguyen Dang Phuong',
            'email' => 'admin@gmail.com',
            'password'=> Hash::make('admin'),
            'phone_number' => '0329603xxx',
            'address' => 'Cau Giay, Ha Noi',
            'age' => 21,
            'image' => 'user1.jpg',
            'fb_link' => 'https://www.facebook.com/ndp.3110/',
            'twitter_link' => '',
            'google_link' => '',
            'ins_link' => '',
        ]);
    }
}
