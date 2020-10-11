<?php

namespace App\Http\Controllers;

use App\Models\Hr\CourseLevel;
use App\Models\Hr\Program;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        dd('home index');
        return view('home');
    }

    public function back()
    {
        dd('working');
        if(Auth::user()->roles->pluck('name')[0] == 'teacher')
            return redirect()->route('teacher.dashboard');
        if(Auth::user()->roles->pluck('name')[0] == 'dean')
            return redirect()->route('dean.dashboard');
        return redirect()->route('teacher.dashboard');
    }
}
