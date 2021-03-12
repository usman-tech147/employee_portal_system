<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('course_program')
            ->insert
            (
                [
                    [
                        'course_id' => 2,
                        'program_id' => 1,
                    ],
                    [
                        'course_id' => 3,
                        'program_id' => 1,
                    ],
                    [
                        'course_id' => 1,
                        'program_id' => 1,
                    ],
                    [
                        'course_id' => 1,
                        'program_id' => 2,
                    ],
                    [
                        'course_id' => 6,
                        'program_id' => 1,
                    ],
                    [
                        'course_id' => 2,
                        'program_id' => 2,
                    ],
                    [
                        'course_id' => 6,
                        'program_id' => 2,
                    ],
                    [
                        'course_id' => 5,
                        'program_id' => 3,
                    ],
                    [
                        'course_id' => 7,
                        'program_id' => 3,
                    ],
                    [
                        'course_id' => 5,
                        'program_id' => 4,
                    ],
                ]
            );
    }
}
