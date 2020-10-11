<?php

namespace App\Http\Controllers\Teacher;

use App\EmployeeFinalReport;
use App\Models\Hr\ManageProgram\Department;
use App\Models\Hr\ManageProgram\School;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use http\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        return view('teacher.dashboard');
    }
    public function teachingTabs()
    {
        return view('teacher.teaching_tabs');
    }


    public function advising()
    {
        return view('teacher.advising_tabs');
    }

    public function research()
    {
        return view('teacher.research_tabs');
    }

    public function institutional()
    {
        return view('teacher.institutional_tabs');
    }

    public function reportToDean()
    {

        $user = User::find(Auth::user()->id);
        $course_details = $user->course_details;
        $course_assessments = $user->course_assessments;
        $new_courses = $user->new_courses;
        $thesis_supervises = $user->thesis_supervises;
        $project_supervises = $user->project_supervises;
        $workshop_terminals = $user->workshop_terminals;
        $batch_advises = $user->batch_advises;
        $travel_and_researches = $user->travel_and_researches;
        $committees = $user->committees;
        return view('teacher.send_report_to_dean',
            compact(
                'user',
                'course_details',
                'course_assessments',
                'new_courses',
                'thesis_supervises',
                'project_supervises',
                'workshop_terminals',
                'batch_advises',
                'travel_and_researches',
                'committees'
                )
        );
    }

    public function submitReport()
    {
        $emp = User::find(Auth::user()->id);
        $emp->status = 1;
        $emp->save();
        return redirect()->route('teacher.dashboard');
    }
    public function viewGrade()
    {
        return view('teacher.view_grade');
    }
    public function viewHistory()
    {
        return view('teacher.view_history');
    }
}
