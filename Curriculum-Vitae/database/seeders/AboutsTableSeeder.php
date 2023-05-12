<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            'content' => 'Hello! I am Nguyen Dang Phuong.',
            'phone_number' => '0329603xxx',
            'address' => 'Cau Giay, Ha Noi',
            'age' => 21,
            'image' => 'user1.jpg',
            'fb_link' => 'https://www.facebook.com/ndp.3110/',
            'twitter_link' => '',
            'google_link' => '',
            'ins_link' => '',
            'profession' => 'BackEnd Developer',
            'language' => 'VietNamese, English',
            'user_id' => 1,
        ]);
    }
}
