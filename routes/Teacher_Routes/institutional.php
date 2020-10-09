<?php

Route::group(['namespace' => 'Teacher', 'middleware' => 'role:teacher'], function () {
    Route::prefix('/teacher/evaluation/portal/teacher')->group(function () {

        Route::get('/institutional-engagements', 'TeacherController@institutional')->name('institutional.tabs')->middleware('disable_links');

        Route::resource('/institutional-engagements/committee', 'InstitutionalEngagement\CommitteeController')->middleware('disable_links');
        Route::get('/all/committee-details', 'InstitutionalEngagement\CommitteeController@getAllCommitteeDetails')->name('all.committee.details');

    });
});