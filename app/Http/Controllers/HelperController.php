<?php

namespace App\Http\Controllers;

use App\Models\Hr\CourseLevel;
use App\Models\Hr\Program;
use Illuminate\Http\Request;

class HelperController extends Controller
{

    public function getCourseLevels()
    {
        $course_levels = CourseLevel::all();
        return response()->json(['course_levels' => $course_levels]);
    }
    public function getCourseLevelPrograms($id)
    {
        $programs = CourseLevel::find(1)->programs;
        return $programs;
    }

    public function getProgramCourses($id)
    {
        $courses = Program::find(1)->courses;
        return $courses;
    }
}
