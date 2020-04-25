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
//        $data = User::find(Auth::user()->id)->workshop_terminals;
//        return $data;
        return view('teacher.teaching.Workshop_Terminal.workshop_terminal');
    }

    public function getWorkshopTerminals()
    {
        $workshop_terminals = User::find(Auth::user()->id)->workshop_terminals;

        return DataTables::of($workshop_terminals)
            ->addColumn('action', function ($workshop) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$workshop->id.'" onclick="editWorkshopTerminal('.$workshop->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$workshop['id'].'" onclick="deleteWorkshopTerminal('.$workshop->id.')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }
//
    public function store(Request $request)
    {
        $rules =
            array(
                'title' => 'required',
                'type' => 'required|not_in:default',
                'month' => 'required',
                'organization' => 'required',
                'sponsoring_body' => 'required',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $workshop_terminal = new WorkshopTerminal($request->all());
        $workshop_terminal->user_id = Auth::user()->id;
        $workshop_terminal->save();

        return response()->json(['success' => 'Workshop Terminal Saved Successfully']);
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
        WorkshopTerminal::find($id)->delete($id);
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
