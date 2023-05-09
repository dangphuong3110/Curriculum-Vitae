<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('work_experiences')->insert([
            [
                'company' => 'WEBM',
                'job_position' => 'Intern',
                'description' => 'Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.',
                'start_date' => 'APRIL 2013',
                'end_date' => 'FEBRUARY 2014',
                'user_id' => 1,
            ],
            [
                'company' => 'WEBNOTE',
                'job_position' => 'Web Developer',
                'description' => 'Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.',
                'start_date' => 'APRIL 2014',
                'end_date' => 'MARCH 2016',
                'user_id' => 1,
            ],
            [
                'company' => 'CREATIVEM',
                'job_position' => 'Back End Developer',
                'description' => 'Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.',
                'start_date' => 'MARCH 2016',
                'end_date' => 'PRESENT',
                'user_id' => 1,
            ],
        ]);
    }
}
