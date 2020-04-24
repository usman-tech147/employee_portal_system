<?php

namespace App\Http\Controllers\Teacher\Teaching;

use App\Models\Teacher\Teaching\WorkshopTerminal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class WorkshopTerminalController extends Controller
{
    public function index()
    {
//        return "thesis supervised";
        $data = User::find(Auth::user()->id)->workshop_terminals;
        return $data;
//        return view('teacher.teaching.Thesis_Supervised.thesis_supervised');
    }

    public function getThesisSupervises()
    {
        $thesis_supervises = User::find(Auth::user()->id)->thesis_supervises;

        return DataTables::of($thesis_supervises)
            ->addColumn('action', function ($thesis) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$thesis->id.'" onclick="editThesisSupervised('.$thesis->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$thesis['id'].'" onclick="deleteThesisSupervised('.$thesis->id.')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }
//
    public function store(Request $request)
    {
        $rules =
            array(
                'thesis_title' => 'required',
                'course_level' => 'required|not_in:default',
                'program' => 'required|not_in:default',
                'superviser_type_a' => 'required|not_in:default',
                'superviser_type_b' => 'required|not_in:default',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $thesis_supervised = new ThesisSupervised($request->all());
        $thesis_supervised->user_id = Auth::user()->id;
        $thesis_supervised->save();

        return response()->json(['success' => 'Thesis Supervised Saved Successfully']);
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
        ThesisSupervised::find($id)->delete($id);
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
