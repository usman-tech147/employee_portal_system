<?php

namespace App\Http\Controllers\Dean;

//use App\EmployeeFinalReport;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('dean.dashboard');
    }

    public function viewTeacher()
    {
        $user_role = '';
        foreach (Auth::user()->getRoleNames() as $r) {
            $user_role = $r;
        }
        $ids = DB::table('reports')->where('dean_status', '=', 1)
            ->get()->pluck('user_id');

        $employees = [];
        for ($i = 0; $i < count($ids); $i++) {
            $teacher = User::find($ids[$i]);
            $employees[] =
                [
                    $teacher,
                ];
        }
        return view('Report.teacher_show', compact('employees', 'user_role'));
    }


    public function returnTeacherReport($id)
    {
//        $user = User::find($id);
//        $user->status = 0;
//        $user->save();

        DB::table('reports')
            ->where('user_id','=',$id)
            ->update(['hr_status' => 1,'dean_status' => 0]);

        return redirect()->route('dean.teachers.report');
    }

    public function submitCommentedReportToHr()
    {
        dd('commented report to hr');
    }

//    public function returnTeacher($id)
//    {
//        $user = User::find($id);
//        $user->status = 0;
//        $user->save();
//        return redirect()->route('dean.teachers');
//    }
//
//    public function assignGrade()
//    {
//        return view('dean.assign_grade');
//    }
//
//    public function reportToHr()
//    {
//        return view('dean.send_report_to_hr');
//    }

}
