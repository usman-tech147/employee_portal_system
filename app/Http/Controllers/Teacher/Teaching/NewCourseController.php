<?php

namespace App\Http\Controllers\Teacher\Teaching;


use App\Http\Controllers\Controller;
use App\Models\Teacher\Teaching\NewCourse;
use Illuminate\Http\Request;

class NewCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'new courses';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher\Teaching\NewCourse  $newCourse
     * @return \Illuminate\Http\Response
     */
    public function show(NewCourse $newCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher\Teaching\NewCourse  $newCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(NewCourse $newCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher\Teaching\NewCourse  $newCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewCourse $newCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher\Teaching\NewCourse  $newCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewCourse $newCourse)
    {
        //
    }
}
