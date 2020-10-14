<?php

Route::group(['namespace' => 'Teacher','middleware' => 'role:teacher'], function () {
    Route::prefix('/teacher/evaluation/portal/teacher')->group(function () {
        Route::get('/dashboard','TeacherController@dashboard')->name('teacher.dashboard');

        Route::post('/submit/report','TeacherController@submitReport')->name('submit.report');

//        Route::get('/send/report/to/hr','TeacherController@reportToDean')->name('teacher.report.dean')->middleware('disable_links');

        Route::get('/view/grade','TeacherController@viewGrade')->name('teacher.grade');
        Route::get('/view/history','TeacherController@viewHistory')->name('teacher.history');
    });
});