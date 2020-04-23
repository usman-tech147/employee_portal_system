<?php

namespace App\Http\Controllers\Teacher\Teaching;


use App\Http\Controllers\Controller;
use App\Models\Teacher\Teaching\NewCourse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class NewCourseController extends Controller
{
    public function index()
    {
        $new_courses = User::find(Auth::user()->id)->new_courses;
        return view('teacher.teaching.New_Course.new_course');
    }

    public function getNewCourses()
    {
        $new_courses = User::find(Auth::user()->id)->new_courses;

        return DataTables::of($new_courses)
            ->addColumn('action', function ($courses) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$courses->id.'" onclick="editNewCourse('.$courses->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$courses['id'].'" onclick="deleteNewCourse('.$courses->id.')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }

    public function store(Request $request)
    {
        $rules =
            array(
                'course_title' => 'required',
                'course_code' => 'required',
                'program' => 'required',
                'status' => 'required|not_in:default',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $new_course = new NewCourse($request->all());
        $new_course->user_id = Auth::user()->id;
        $new_course->save();

        return response()->json(['success' => 'New Course Saved Successfully']);
    }

//    public function edit($id)
//    {
//        $data = CourseAssessment::findOrFail($id);
//        return $data;
//    }
//
//
//    public function update(Request $request, $id)
//    {
//        $rules =
//            array(
//                'course_title' => 'required',
//                'course_code' => 'required',
//                'program' => 'required',
//                'status' => 'required|not_in:default',
//            );
//
//        $error = Validator::make($request->all(), $rules);
//        if ($error->fails()) {
//            return response()->json(['errors' => $error->errors()]);
//        }
//        $new_course = NewCourse::find($id);
//        $new_course->fill($request->all());
//        $new_course->update();
//
//        return response()->json(['success' => 'New Course Edited Successfully']);
//    }

    public function destroy($id)
    {
        NewCourse::find($id)->delete($id);
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
