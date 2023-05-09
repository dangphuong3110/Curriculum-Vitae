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
            'language' => 'VietNamese, English',
            'user_id' => 1,
        ]);
    }
}
