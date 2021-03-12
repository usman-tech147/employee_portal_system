<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseLevel_ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_level_program')
            ->insert
            (
                [
                    [
                        'course_level_id' => 1,
                        'program_id' => 1,
                    ],
                    [
                        'course_level_id' => 1,
                        'program_id' => 2,
                    ],
                    [
                        'course_level_id' => 1,
                        'program_id' => 3,
                    ],
                    [
                        'course_level_id' => 2,
                        'program_id' => 2,
                    ],
                    [
                        'course_level_id' => 3,
                        'program_id' => 4,
                    ],
                ]
            );
    }
}
