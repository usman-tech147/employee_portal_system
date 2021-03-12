<?php

namespace App\Http\Controllers\HR;

use App\EmployeeFinalReport;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('hr.dashboard');
    }

    public function viewTeacher()
    {
//        $arr = [1, 3, 4];

        $arr = DB::table('report_marks')
            ->where('hr_marks', '=', 1)->get()->pluck('user_id')->toArray();

        $user_role = '';
        foreach (Auth::user()->getRoleNames() as $r) {
            $user_role = $r;
        }
        $ids = DB::table('reports')->where('hr_status', '=', 1)
            ->get()->pluck('user_id');

        $employees = [];
        for ($i = 0; $i < count($ids); $i++) {
            $teacher = User::find($ids[$i]);
            $employees[] =
                [
                    $teacher,
                ];
        }
//        dd($ids);
//        $employees = User::where('status',1)->get();
//        dd($employees);
        return view('Report.teacher_show', compact('employees', 'arr', 'user_role'));
    }

//
    public function returnTeacherReport($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        DB::table('reports')
            ->where('user_id', '=', $id)
            ->update(['hr_status' => 0]);

        return redirect()->route('hr.teachers.report');
    }

    public function viewTeacherReport($id)
    {
        $user = User::find($id);
        $role = '';
//        $status = 1;
        foreach (Auth::user()->getRoleNames() as $r) {
            $role = $r;
        }
        $course_details = $user->course_details;
        $course_assessments = $user->course_assessments;
        $new_courses = $user->new_courses;
        $thesis_supervises = $user->thesis_supervises;
        $project_supervises = $user->project_supervises;
        $workshop_terminals = $user->workshop_terminals;
        $batch_advises = $user->batch_advises;
        $travel_and_researches = $user->travel_and_researches;
        $committees = $user->committees;
        return view('Report.report',
            compact(
                'role',
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

    public function saveReportMarks(Request $request)
    {
        DB::table('report_marks')->insert
        (
            [

                'user_id' => $request->user_id,
                'course_detail' => $request->course_detail,
                'course_assessment' => $request->course_assessment,
                'new_course' => $request->new_course,
                'thesis_supervise' => $request->thesis_supervise,
                'project_supervise' => $request->project_supervise,
                'workshop_terminal' => $request->workshop_terminal,
                'batch_advise' => $request->batch_advise,
                'travel_and_research' => $request->travel_and_research,
                'committee' => $request->committee,
                'comment_marks' => 0,
                'total_marks' => 0,
                'grades' => '0',
                'hr_marks' => 1,
                'dean_marks' => 0,
                'year' => '2019'
            ]
        );
        return response()->json(
            ['message' => 'Report Marks Saved Successfully']
        );
    }

    public function editReportMarks($id)
    {
        $user = User::find($id);
        $role = '';
        foreach (Auth::user()->getRoleNames() as $r) {
            $role = $r;
        }

        $user_sessional_marks = DB::table('report_marks')
            ->where('user_id', '=', $id)
            ->get(
                [
                    'course_detail',
                    'course_assessment',
                    'new_course',
                    'thesis_supervise',
                    'project_supervise',
                    'workshop_terminal',
                    'batch_advise',
                    'travel_and_research',
                    'committee'
                ]
            )->toArray();

        $course_details = $user->course_details;
        $course_assessments = $user->course_assessments;
        $new_courses = $user->new_courses;
        $thesis_supervises = $user->thesis_supervises;
        $project_supervises = $user->project_supervises;
        $workshop_terminals = $user->workshop_terminals;
        $batch_advises = $user->batch_advises;
        $travel_and_researches = $user->travel_and_researches;
        $committees = $user->committees;

        return view('Report.report',
            compact(
                'role',
                'user',
                'course_details',
                'course_assessments',
                'new_courses',
                'thesis_supervises',
                'project_supervises',
                'workshop_terminals',
                'batch_advises',
                'travel_and_researches',
                'committees',
                'user_sessional_marks'
            )
        );
    }

    public function updateReportMarks($id, Request $request)
    {
        DB::table('report_marks')
            ->where('user_id', $id)
            ->update($request->only(
                [
                    'course_detail',
                    'course_assessment',
                    'new_course',
                    'thesis_supervise',
                    'project_supervise',
                    'workshop_terminal',
                    'batch_advise',
                    'travel_and_research',
                    'committee'
                ]
            ));
        return response()->json(['message' => 'Marks Updated Successfully']);
    }

    public function submitReportToDean($id, Request $request)
    {
//        DB::table('reports')
//            ->where('user_id', '=', $id)
//            ->update(['hr_status' => 0, 'dean_status' => 1]);

        return response()->json(['data' => $id, 'request' => $request->all()]);
    }
//
//    public function assignGrade()
//    {
//        return view('dean.assign_grade');
//    }
//    public function reportToHr()
//    {
//        return view('dean.send_report_to_hr');
//    }

}
