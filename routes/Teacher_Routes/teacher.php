<?php

Route::group(['namespace' => 'Teacher','middleware' => 'role:teacher'], function () {
    Route::prefix('/teacher/evaluation/portal/teacher')->group(function () {
        Route::get('/dashboard','TeacherController@dashboard')->name('teacher.dashboard');

//        Route::get('/send/report/to/hr','TeacherController@reportToDean')->name('teacher.report.dean')->middleware('disable_links');
        Route::get('/view/grade','TeacherController@viewGrade')->name('teacher.grade');
        Route::get('/view/history','TeacherController@viewHistory')->name('teacher.history');









        Route::get('view/report','TeacherController@viewReport')->name('teacher.view.report');
        Route::post('/submit/report/hr','TeacherController@submitReportToHr')->name('submit.report.hr');




    });
});