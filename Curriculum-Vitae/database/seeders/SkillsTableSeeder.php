<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [
                'skill_name' => 'HTML',
                'skill_percent'=> 80,
                'user_id' => 1,
            ],
            [
                'skill_name' => 'CSS',
                'skill_percent'=> 75,
                'user_id' => 1,
            ],
            [
                'skill_name' => 'JavaScript',
                'skill_percent'=> 60,
                'user_id' => 1,
            ],
            [
                'skill_name' => 'Bootstrap',
                'skill_percent'=> 75,
                'user_id' => 1,
            ],
            [
                'skill_name' => 'PHP',
                'skill_percent'=> 80,
                'user_id' => 1,
            ],
            [
                'skill_name' => 'Laravel',
                'skill_percent'=> 70,
                'user_id' => 1,
            ]
        ]);
    }
}
