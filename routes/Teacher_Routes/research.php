<?php

Route::group(['namespace' => 'Teacher', 'middleware' => 'role:teacher'], function () {
    Route::prefix('/teacher/evaluation/portal/teacher')->group(function () {

        Route::get('/research-and-publications', 'TeacherController@research')->name('research.tabs')->middleware('disable_links');
        //teaching routes
        //2.1: course detail routes
        Route::resource('/research-and-publications/travel_and_research', 'ResearchAndPublications\TravelAndResearchController')->middleware('disable_links');
        Route::get('/all/travel-and-research-details', 'ResearchAndPublications\TravelAndResearchController@getTravelAndResearchDetails')->name('all.travel.details');


//        //teaching routes

    });
});