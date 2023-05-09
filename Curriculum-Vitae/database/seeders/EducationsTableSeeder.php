<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('educations')->insert([
            [
                'major' => 'Science and Mathematics',
                'degree' => 'High School',
                'school' => 'SCHOOL OF SECONDARY BOARD',
                'description' => 'Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.',
                'start_date' => '2007',
                'end_date' => '2009',
                'user_id' => 1,
            ],
            [
                'major' => 'Bachelor of Computer Science',
                'degree' => "Bachelor's Degree",
                'school' => 'UNIVERSITY OF COMPUTER SCIENCE',
                'description' => 'Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.',
                'start_date' => '2009',
                'end_date' => '2013',
                'user_id' => 1,
            ],
            [
                'major' => 'Master of Information Technology',
                'degree' => "Master's Degree",
                'school' => 'UNIVERSITY OF COMPUTER SCIENCE',
                'description' => 'Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.',
                'start_date' => '2013',
                'end_date' => '2015',
                'user_id' => 1,
            ],
        ]);
    }
}
