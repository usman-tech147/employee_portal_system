<?php

use Illuminate\Database\Seeder;
use App\Models\Hr\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'course_name' => 'database',
                'course_code' => 'db-100',
            ],
            [
                'course_name' => 'data science',
                'course_code' => 'ds-100',
            ],
            [
                'course_name' => 'life and learning',
                'course_code' => 'l-100',
            ],
            [
                'course_name' => 'sociology',
                'course_code' => 's-100',
            ],
            [
                'course_name' => 'calculus',
                'course_code' => 'c-100',
            ],
            [
                'course_name' => 'biology',
                'course_code' => 'b-100',
            ]
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
