<?php

namespace App\Http\Controllers\Teacher\ResearchAndPublications;

use App\Models\Teacher\ResearchAndPublications\TravelAndResearch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class TravelAndResearchController extends Controller
{
    public function index()
    {
//        dd('batch index');
//        return "thesis supervised";
        $data = User::find(Auth::user()->id)->travel_and_researches;
        return $data;
//        return view('teacher.advising.Batch_Advising.batch_advising');
    }

//    public function getBatchAdvisesDetail()
//    {
//        $batch_advises = User::find(Auth::user()->id)->batch_advises;
//
//        return DataTables::of($batch_advises)
//            ->addColumn('action', function ($advises) {
//                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
//                $button .= '<button id="'.$advises->id.'" onclick="editBatchAdvising('.$advises->id.')" class="edit btn btn-warning">Edit</button>';
//                $button .= '<button type="button" id="'.$advises['id'].'" onclick="deleteBatchAdvising('.$advises->id.')" class="delete btn btn-danger">Delete</button>';
//                $button .= '</div>';
//                return $button;
//            })->rawColumns(['action'])->toJson();
//
//    }
//
//    public function store(Request $request)
//    {
//        $rules =
//            array(
//                'program' => 'required|not_in:default',
//                'batch' => 'required|not_in:default',
//                'start_date' => 'required',
//                'end_date' => 'required',
//                'no_of_students' => 'required',
//                'meeting_held_on' => 'required|not_in:default',
//            );
//        $error = Validator::make($request->all(), $rules);
//        if ($error->fails()) {
//            return response()->json(['errors' => $error->errors()]);
//        }
//        $thesis_supervised = new BatchAdvising($request->all());
//        $thesis_supervised->user_id = Auth::user()->id;
//        $thesis_supervised->save();
//
//        return response()->json(['success' => 'Batch Advising Saved Successfully']);
//    }

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

//    public function destroy($id)
//    {
//        BatchAdvising::find($id)->delete($id);
//        return response()->json([
//            'success' => 'Record Deleted Successfully!'
//        ]);
//    }
}
