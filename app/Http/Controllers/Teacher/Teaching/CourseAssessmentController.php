<?php

namespace App\Http\Controllers\Teacher\Teaching;

use App\Models\Teacher\Teaching\CourseAssessment;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class CourseAssessmentController extends Controller
{
    public function index()
    {
//        $course_Assessments = User::find(Auth::user()->id)->course_assessments;
        return view('teacher.teaching.Course_Assessment.course_assessment');
    }

    public function getCoursesAssessments()
    {
        $course_Assessments = User::find(Auth::user()->id)->course_assessments;

        return DataTables::of($course_Assessments)
            ->addColumn('action', function ($courses) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$courses->id.'" onclick="editCourseAssessmet('.$courses->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$courses['id'].'" onclick="deleteCourseAssessmet('.$courses->id.')" class="delete btn btn-danger">Delete</button>';
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
                'course_code' => 'required',
                'semester' => 'required|not_in:default',
                'final_result_submission' => 'required|not_in:default',
                'moodle_usage_status' => 'required',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $course = new CourseAssessment($request->all());
        $course->user_id = Auth::user()->id;
        $course->save();

        return response()->json(['success' => 'Course Assessment Saved Successfully']);
    }

    public function edit($id)
    {
        $data = CourseAssessment::findOrFail($id);
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
                'final_result_submission' => 'required|not_in:default',
                'moodle_usage_status' => 'required',
            );

        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $course = CourseAssessment::find($id);
        $course->fill($request->all());
        $course->update();

        return response()->json(['success' => 'Course Assessment Edited Successfully']);
    }

    public function destroy($id)
    {
        CourseAssessment::find($id)->delete($id);
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
