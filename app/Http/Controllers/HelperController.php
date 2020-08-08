<?php

namespace App\Http\Controllers;

use App\Models\Hr\CourseLevel;
use App\Models\Hr\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
//        $programs = CourseLevel::find($id)->programs;


//        $programs = CourseLevel::where('id',$id)->programs;
//        $programs = DB::table(['programs'])-
//        $programs = CourseLevel::with('programs')->where('id', $id)->get();
//        $programs = Program::all();

        $programs = DB::table('course_levels')
            ->join('course_level_program',function($query){
                $id = 1;
                $query->on('course_levels.id','=','course_level_program.course_level_id')
                    ->where('course_levels.id', '=', $id);
            })
            ->join('programs','programs.id','=','course_level_program.program_id')
            ->select('programs.id','programs.name')
            ->get();
//
//        return $programs;

//        return $programs;

        return response()->json(['programs' => $programs]);
    }

    public function getProgramCourses($id)
    {
        $courses = Program::find($id)->courses;
        return response()->json(['courses' => $courses]);
    }

}
