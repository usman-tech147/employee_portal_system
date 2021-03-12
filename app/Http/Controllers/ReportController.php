<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

//    public function reportToDean()
//    {
//        $user = User::find(Auth::user()->id);
//        $course_details = $user->course_details;
//        $course_assessments = $user->course_assessments;
//        $new_courses = $user->new_courses;
//        $thesis_supervises = $user->thesis_supervises;
//        $project_supervises = $user->project_supervises;
//        $workshop_terminals = $user->workshop_terminals;
//        $batch_advises = $user->batch_advises;
//        $travel_and_researches = $user->travel_and_researches;
//        $committees = $user->committees;
//        return view('teacher.send_report_to_dean',
//            compact(
//                'user',
//                'course_details',
//                'course_assessments',
//                'new_courses',
//                'thesis_supervises',
//                'project_supervises',
//                'workshop_terminals',
//                'batch_advises',
//                'travel_and_researches',
//                'committees'
//            )
//        );
//    }

//    public function reportToHr()
//    {
//        $user = User::find(Auth::user()->id);
//        $course_details = $user->course_details;
//        $course_assessments = $user->course_assessments;
//        $new_courses = $user->new_courses;
//        $thesis_supervises = $user->thesis_supervises;
//        $project_supervises = $user->project_supervises;
//        $workshop_terminals = $user->workshop_terminals;
//        $batch_advises = $user->batch_advises;
//        $travel_and_researches = $user->travel_and_researches;
//        $committees = $user->committees;
//        return view('teacher.send_report_to_dean',
//            compact(
//                'user',
//                'course_details',
//                'course_assessments',
//                'new_courses',
//                'thesis_supervises',
//                'project_supervises',
//                'workshop_terminals',
//                'batch_advises',
//                'travel_and_researches',
//                'committees'
//            )
//        );
//    }
}
