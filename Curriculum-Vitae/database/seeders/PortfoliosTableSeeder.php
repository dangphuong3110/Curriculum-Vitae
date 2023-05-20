<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('portfolios')->insert([
            [
                'project_name' => 'FrontEnd Project',
                'project_link' => 'https://github.com/dangphuong3110/BTL-N09-PTWeb',
                'project_desc' => $faker->sentence(5),
                'image' => 'project1-1.jpg',
                'user_id' => 1,
            ],
            [
                'project_name' => 'Android Project',
                'project_link' => 'https://github.com/dangphuong3110/BTL_PTUD',
                'project_desc' => $faker->sentence(5),
                'image' => 'project2-1.jpg',
                'user_id' => 1,
            ],
            [
                'project_name' => 'Recent Project',
                'project_link' => 'https://github.com/dangphuong3110/Curriculum-Vitae',
                'project_desc' => $faker->sentence(5),
                'image' => 'project3-1.jpg',
                'user_id' => 1,
            ],
        ]);
    }
}
