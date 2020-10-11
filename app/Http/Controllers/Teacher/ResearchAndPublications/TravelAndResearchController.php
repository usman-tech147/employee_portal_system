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
        return view('teacher.research.Travel_And_Research.travel_and_research');
    }

    public function getTravelAndResearchDetails()
    {
        $travel_researches = User::find(Auth::user()->id)->travel_and_researches;

        return DataTables::of($travel_researches)
            ->addColumn('action', function ($travels) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$travels->id.'" onclick="editTravelAndResearch('.$travels->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$travels['id'].'" onclick="deleteTravelAndResearch('.$travels->id.')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })->rawColumns(['action'])->toJson();

    }
//
    public function store(Request $request)
    {
        $rules =
            array(
                'research_type' => 'required|not_in:default',
                'funding_agency' => 'required',
                'venue' => 'required',
                'total_grants' => 'required',
                'approval' => 'required',
            );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()]);
        }
        $travel = new TravelAndResearch($request->all());
        $travel->user_id = Auth::user()->id;
        $travel->save();

        return response()->json(['success' => 'travel detail Saved Successfully']);
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
        TravelAndResearch::find($id)->delete($id);
        return response()->json([
            'success' => 'Record Deleted Successfully!'
        ]);
    }
}
