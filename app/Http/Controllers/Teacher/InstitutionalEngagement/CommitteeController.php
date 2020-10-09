<?php

namespace App\Http\Controllers\Teacher\InstitutionalEngagement;

use App\Models\Teacher\InstitutionalEngagement\Committee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommitteeController extends Controller
{

    public function index()
    {
        return view('teacher.institution.Committee.committee');
    }

    public function getAllCommitteeDetails()
    {
        $committees = User::find(Auth::user()->id)->committees;

        return DataTables::of($committees)
            ->addColumn('action', function ($committee) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="' . $committee->id . '" onclick="" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="' . $committee['id'] . '" onclick="" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }

//
    public function store(Request $request)
    {
        $rules =
            array(
                'name' => 'required',
                'member_since' => 'required',
                'formed_by' => 'required',
                'position' => 'required',
                'type' => 'required',
                'chairperson' => 'required',
                'no_of_meetings' => 'required',
                'attends' => 'required',
                'contribution' => 'required',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $committee = new Committee($request->all());
        $committee->user_id = Auth::user()->id;
        $committee->save();

        return response()->json(['success' => 'Committee Details Saved Successfully']);
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
//        BatchAdvising::find($id)->delete($id);
//        return response()->json([
//            'success' => 'Record Deleted Successfully!'
//        ]);
    }
}
