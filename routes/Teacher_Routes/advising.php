<?php

Route::group(['namespace' => 'Teacher', 'middleware' => 'role:teacher'], function () {
    Route::prefix('/teacher/evaluation/portal/teacher')->group(function () {

        Route::get('/advising-and-counseling', 'TeacherController@advising')->name('advising.tabs')->middleware('disable_links');
        //advising routes
        //3.2: course detail routes
        Route::resource('/advising-and-counseling/batch_advising', 'Advising\BatchAdvisingController')->middleware('disable_links');
        Route::get('/all/batch-advising-details', 'Advising\BatchAdvisingController@getBatchAdvisesDetail')->name('all.batch.advising.details');

//        //advising routes

    });
});