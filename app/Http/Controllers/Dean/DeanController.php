<?php

namespace App\Http\Controllers\Dean;

use App\EmployeeFinalReport;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $employees = User::where('status',1)->get();
        return view('dean.teacher_show',compact('employees'));
    }

    public function returnTeacher($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return redirect()->route('dean.teachers');
    }

    public function assignGrade()
    {
        return view('dean.assign_grade');
    }
    public function reportToHr()
    {
        return view('dean.send_report_to_hr');
    }

}
