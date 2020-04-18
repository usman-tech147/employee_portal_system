<?php

namespace App\Http\Controllers\Teacher\Teaching;

use App\Models\Hr\CourseLevel;
use App\Models\Hr\Program;
use App\Models\Teacher\Teaching\CourseDetail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CourseDetailController extends Controller
{
    public function index()
    {
//        $programs = CourseLevel::find(3)->programs;
//        return $programs;
//        $courses = Program::find(1)->courses;
//        return $courses;
        return view('teacher.teaching.Course_Detail.course_detail_show');
    }

    public function getCoursesDetail()
    {
        $course_Details = User::find(Auth::user()->id)->course_details;
        return DataTables::of($course_Details)
            ->addColumn('action', function ($courses) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$courses->id.'" onclick="editCourseDetail('.$courses->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$courses['id'].'" onclick="deleteCourseDetail('.$courses->id.')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }

    public function store(Request $request)
    {
        $rules =
            array(
                'course_level' => 'required|not_in:default',
                'program' => 'required|not_in:default',
                'course_title' => 'required|not_in:default',
                'course_code' => 'required|not_in:default',
                'semester' => 'required|not_in:default',
                'assessments' => 'required',
                'makeup_classes' => 'required',
                'student_feedback' => 'required',
            );

        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $course = new CourseDetail($request->all());
        $course->user_id = Auth::user()->id;
        $course->save();

        return response()->json(['success' => 'Course Detail Saved Successfully']);
    }

    public function edit($id)
    {
        $data = CourseDetail::findOrFail($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $rules =
            array(
                'course_level' => 'required|not_in:default',
                'program' => 'required|not_in:default',
                'course_title' => 'required|not_in:default',
                'course_code' => 'required|not_in:default',
                'semester' => 'required|not_in:default',
                'assessments' => 'required',
                'makeup_classes' => 'required',
                'student_feedback' => 'required',
            );

        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $course = CourseDetail::find($id);
        $course->fill($request->all());
        $course->update();

        return response()->json(['success' => 'Course Detail Edited Successfully']);
    }

    public function destroy($id)
    {
        CourseDetail::find($id)->delete($id);
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
