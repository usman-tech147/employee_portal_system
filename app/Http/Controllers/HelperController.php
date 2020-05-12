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

    public function getPrograms()
    {
        $programs = Program::all();
        return response()->json(['programs' => $programs]);
    }

    public function getCourseLevelPrograms($id)
    {
        $programs = CourseLevel::find($id)->programs;
        return response()->json(['programs' => $programs]);
    }

    public function getProgramCourses($id)
    {
        $courses = Program::find($id)->courses;
        return response()->json(['courses' => $courses]);
    }

}
