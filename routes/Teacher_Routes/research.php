<?php

Route::group(['namespace' => 'Teacher', 'middleware' => 'role:teacher'], function () {
    Route::prefix('/teacher/evaluation/portal/teacher')->group(function () {

        Route::get('/research-and-publications', 'TeacherController@research')->name('research.tabs')->middleware('disable_links');
        //teaching routes
        //2.1: course detail routes
        Route::resource('/teaching/course_detail', 'Teaching\CourseDetailController')->middleware('disable_links');
        Route::get('/all/courses/details', 'Teaching\CourseDetailController@getCoursesDetail')->name('all.courses.details');


        // 2.3: course assessments routes
        Route::resource('/teaching/course_assessments', 'Teaching\CourseAssessmentController')->middleware('disable_links');
        Route::get('/all/courses/assessments', 'Teaching\CourseAssessmentController@getCoursesAssessments')->name('all.courses.assessments');


//        // 2.3: New Course routes
        Route::resource('/teaching/new_course', 'Teaching\NewCourseController')->middleware('disable_links');
        Route::get('/all/new/courses', 'Teaching\NewCourseController@getNewCourses')->name('all.new.courses');


        // 2.3: Thesis Supervised routes
        Route::resource('/teaching/thesis_supervised', 'Teaching\ThesisSupervisedController')->middleware('disable_links');
        Route::get('/all/thesis/supervises', 'Teaching\ThesisSupervisedController@getThesisSupervises')->name('all.thesis.supervises');

        // 2.3: Project Supervision routes
        Route::resource('/teaching/project_supervision', 'Teaching\ProjectSupervisionController')->middleware('disable_links');
        Route::get('/all/project/supervises', 'Teaching\ProjectSupervisionController@getProjectSupervises')->name('all.project.supervises');


        // 2.3: Workshop Terminal routes
        Route::resource('/teaching/workshop_terminal', 'Teaching\WorkshopTerminalController')->middleware('disable_links');
        Route::get('/all/workshop/terminals', 'Teaching\WorkshopTerminalController@getWorkshopTerminals')->name('all.workshop.terminals');

//        //teaching routes

    });
});