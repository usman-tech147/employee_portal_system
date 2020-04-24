<?php

namespace App\Http\Controllers\Teacher\Teaching;

use App\Models\Teacher\Teaching\ProjectSupervision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ProjectSupervisionController extends Controller
{
    public function index()
    {
//        return "thesis supervised";
//        $data = User::find(Auth::user()->id)->project_supervises;
//        return $data;
        return view('teacher.teaching.Project_Supervison.project_supervision');
    }

    public function getProjectSupervises()
    {
        $project_supervises = User::find(Auth::user()->id)->project_supervises;

        return DataTables::of($project_supervises)
            ->addColumn('action', function ($project) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$project->id.'" onclick="editProjectSupervised('.$project->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$project['id'].'" onclick="deleteProjectSupervised('.$project->id.')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }
//
    public function store(Request $request)
    {
        $rules =
            array(
                'project_title' => 'required',
                'course_level' => 'required|not_in:default',
                'program' => 'required|not_in:default',
                'no_of_students' => 'required',
                'organization_name' => 'required',
                'project_type' => 'required',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $project_supervised = new ProjectSupervision($request->all());
        $project_supervised->user_id = Auth::user()->id;
        $project_supervised->save();

        return response()->json(['success' => 'Project Supervised Saved Successfully']);
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
        ProjectSupervision::find($id)->delete($id);
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
