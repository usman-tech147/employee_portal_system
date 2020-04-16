<?php

namespace App\Http\Controllers\HR;

use App\Models\Hr\Course;
use App\Models\Hr\Program;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index()
    {
//        $programs = Course::find(1)->programs;

        return view('hr.courses.course');
    }

    public function getAllPrograms()
    {
        $programs = Program::select('id', 'name')->get();
        $data = '';
//
        foreach ($programs as $program) {
            $data .= '<option value="' . $program->id . '">' . $program->name . '</option>';
        }
        return response()->json(['data' => $data]);
    }

    public function getAllCourses()
    {
//        $courses = Course::select('id','course_name','course_code')->with('programs:id,name')->get();
//        dd($course);
        $courses = Course::all();

        return DataTables::of($courses)
            ->addColumn('program', function ($courses) {
                $programs = Course::find($courses->id)->programs;
//                return $programs;
                $progs = array();
                foreach ($programs as $program) {
                    array_push($progs, $program->name);

                }
                return $progs;
            })
            ->addColumn('action', function ($courses) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="' . $courses->id . '" onclick="editCourse(' . $courses->id . ')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="' . $courses['id'] . '" onclick="deleteCourse(' . $courses->id . ')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }

    public function store(Request $request)
    {
        $rules =
            array(
                'course_name' => 'required',
                'course_code' => 'required',
                'programs' => 'required|array',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_code = $request->course_code;
        $course->save();
        $course->programs()->sync($request->programs);


        return response()->json(['success' => 'course activity done successfully']);
    }
//
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
//                'course_level' => 'required|not_in:default',
//                'program' => 'required|not_in:default',
//                'course_title' => 'required|not_in:default',
//                'course_code' => 'required|not_in:default',
//                'semester' => 'required|not_in:default',
//                'final_result_submission' => 'required|not_in:default',
//                'moodle_usage_status' => 'required',
//            );
//
//        $error = Validator::make($request->all(), $rules);
//        if ($error->fails()) {
//            return response()->json(['errors' => $error->errors()]);
//        }
//        $course = CourseAssessment::find($id);
//        $course->fill($request->all());
//        $course->update();
//
//        return response()->json(['success' => 'Course Assessment Edited Successfully']);
//    }
//
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
//        'success' => 'Record Deleted Successfully!'
//        return $course->programs();
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
