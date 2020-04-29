<?php

//Route::group(['namespace' => 'HR', 'middleware' => 'role:hr'], function () {
//    Route::prefix('/teacher/evaluation/portal/hr')->group(function () {
//
//    });
//});

Route::get('/helper/course-levels','HelperController@getCourseLevels')->name('helper.course_levels');

Route::get('/helper/programs','HelperController@getPrograms')->name('helper.programs');

Route::get('/helper/course-level/{id}/programs','HelperController@getCourseLevelPrograms')->name('helper.course_level.programs');

Route::get('/helper/program/{id}/courses','HelperController@getProgramCourses')->name('helper.program.courses');