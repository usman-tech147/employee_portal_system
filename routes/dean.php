<?php

Route::group(['namespace' => 'Dean','middleware' => 'role:dean'], function () {
    Route::prefix('/teacher/evaluation/portal/dean')->group(function () {
        Route::get('/dashboard','DeanController@dashboard')->name('dean.dashboard');
        Route::get('/assign/grade','DeanController@assignGrade')->name('dean.assign.grade');
        Route::get('/send/report/to/hr','DeanController@reportToHr')->name('dean.report.hr');
        Route::get('/view/teacher','DeanController@viewTeacher')->name('dean.teachers');
        Route::get('/return/teacher/{id}','DeanController@returnTeacher')->name('dean.return.teacher');
        Route::get('/view/teacher/report','DeanController@viewTeacherReport')->name('dean.teacher.report');
    });
});